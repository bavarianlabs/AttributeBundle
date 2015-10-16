<?php

/*
 * This file is part of the Bavarian package.
 *
 * (c) Jorge Vahldick <jorge.dev@outlook.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bavarian\Bundle\AttributeBundle\EventListener;

use Doctrine\DBAL\DBALException;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\UnitOfWork;
use Bavarian\Bundle\AttributeBundle\Model\Attribute;
use Bavarian\Bundle\AttributeBundle\Model\Schema;

/**
 * @author Jorge Vahldick <jorge.dev@outlook.com>
 */
class AttributeCreatorListener
{

    protected $mappings;

    /**
     * {@inheritdoc}
     */
    function __construct(array $mappings = array())
    {
        $this->mappings = $mappings;
    }

    public function postLoad(LifecycleEventArgs $eventArgs)
    {
        $em         = $eventArgs->getEntityManager();
        $uow        = $em->getUnitOfWork();
        $entity     = $eventArgs->getEntity();
        $classname  = get_class($entity);

        if (!array_key_exists($classname, $this->mappings)) {
            return null;
        }

        /** @var Schema $schema */
        $schema = $em->getRepository('Padam87AttributeBundle:Schema')->findOneBy([
            'className' => $classname,
        ]);

        if ($schema === null) {
            throw new \UnexpectedValueException('Schema not found for ' . $classname);
        }

        $qb = $em->getRepository($classname)->createQueryBuilder('main');
        $qb
            ->distinct()
            ->select('d.id')
            ->join('main.attributes', 'a')
            ->join('a.definition', 'd', null, null, 'd.id')
            ->where('main = :main')
            ->setParameter('main', $entity)
        ;

        $definitions    = $qb->getQuery()->getScalarResult();
        $ids            = array_map('current', $definitions);

        foreach ($schema->getDefinitions() as $definition) {
            if (!array_key_exists($definition->getId(), $ids)) {
                $attribute = new Attribute();
                $attribute->setDefinition($definition);
                $entity->addAttribute($attribute);
            }
        }

        if ($uow->getEntityState($entity) == UnitOfWork::STATE_MANAGED) {
            $em->persist($entity);
            $em->flush($entity);
        }
    }

}