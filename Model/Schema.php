<?php

/*
 * This file is part of the Bavarian package.
 *
 * (c) Jorge Vahldick <jorge.dev@outlook.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bavarian\Bundle\AttributeBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @author Jorge Vahldick <jorge.dev@outlook.com>
 */
class Schema implements SchemaInterface
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $className;

    /**
     * @var Definition[]
     */
    protected $definitions;

    /**
     * {@inheritdoc}
     */
    function __construct()
    {
        $this->definitions = new ArrayCollection();
    }

    /**
     * Returns the schema unique id.
     *
     * @return  int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function setClassName($className)
    {
        $this->className = $className;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefinitions(ArrayCollection $definitions)
    {
        $this->definitions = $definitions;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDefinitions()
    {
        return $this->definitions;
    }

    /**
     * {@inheritdoc}
     */
    public function hasDefinition(DefinitionInterface $definition)
    {
        return $this->definitions->contains($definition);
    }

    /**
     * {@inheritdoc}
     */
    public function removeDefinition(DefinitionInterface $definition)
    {
        if ($this->hasDefinition($definition)) {
            $this->definitions->remove($definition);
            $definition->setSchema(null);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addDefinition(DefinitionInterface $definition)
    {
        if (false === $this->hasDefinition($definition)) {
            $this->definitions->add($definition);
            $definition->setSchema($this);
        }

        return $this;
    }

}