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
class Definition implements DefinitionInterface
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var boolean
     */
    protected $required;

    /**
     * @var int
     */
    protected $orderIndex;

    /**
     * @var Attribute[]
     */
    protected $attributes;

    /**
     * @var Option[]
     */
    protected $options;

    /**
     * @var SchemaInterface
     */
    protected $schema;

    /**
     * {@inheritdoc}
     */
    function __construct()
    {
        $this->required = false;
        $this->attributes = new ArrayCollection();
        $this->options = new ArrayCollection();
    }

    /**
     * Returns the definition unique id.
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
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * {@inheritdoc}
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     */
    public function setRequired($required)
    {
        $this->required = $required;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function isRequired()
    {
        return $this->required;
    }

    /**
     * {@inheritdoc}
     */
    public function setOrderIndex($order)
    {
        $this->orderIndex = $order;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getOrderIndex()
    {
        return $this->orderIndex;
    }

    /**
     * {@inheritdoc}
     */
    public function setSchema(SchemaInterface $schema = null)
    {
        $this->schema = $schema;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSchema()
    {
        return $this->schema;
    }

    /**
     * {@inheritdoc}
     */
    public function setAttributes(ArrayCollection $attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * {@inheritdoc}
     */
    public function addAttribute(AttributeInterface $attribute)
    {
        if (false === $this->hasAttribute($attribute)) {
            $this->attributes->add($attribute);
            $attribute->setDefinition($this);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeAttribute(AttributeInterface $attribute)
    {
        if ($this->hasAttribute($attribute)) {
            $this->attributes->remove($attribute);
            $attribute->setDefinition(null);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function hasAttribute(AttributeInterface $attribute)
    {
        return $this->attributes->contains($attribute);
    }

    /**
     * {@inheritdoc}
     */
    public function setOptions(ArrayCollection $options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * {@inheritdoc}
     */
    public function addOption(OptionInterface $option)
    {
        if (false === $this->hasOption($option)) {
            $this->options->add($option);
            $option->setDefinition($this);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeOption(OptionInterface $option)
    {
        if ($this->hasOption($option)) {
            $this->options->remove($option);
            $option->setDefinition(null);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function hasOption(OptionInterface $option)
    {
        return $this->options->contains($option);
    }

}