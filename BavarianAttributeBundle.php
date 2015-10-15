<?php

namespace Bavarian\Bundle\AttributeBundle;

use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class BavarianAttributeBundle extends Bundle
{

    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $ormCompilerClass = 'Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass';
        if (class_exists($ormCompilerClass)) {
            $container->addCompilerPass($this->buildMappingCompilerPass());
        }
    }

    private function buildMappingCompilerPass()
    {
        $modelDir = realpath(__DIR__.'/Resources/config/doctrine/model');
        $mappings = array(
            $modelDir => 'Bavarian\Bundle\AttributeBundle\Model',
        );

        return DoctrineOrmMappingsPass::createXmlMappingDriver(
            $mappings,
            array('bavarian_attribute.manager_name'),
            'bavarian_attribute.orm_enabled',
            array('BavarianAttributeBundle' => 'Bavarian\Bundle\AttributeBundle\Model')
        );
    }

}
