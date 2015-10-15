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

/**
 * @author Jorge Vahldick <jorge.dev@outlook.com>
 */
class Attribute implements AttributeInterface
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var DefinitionInterface
     */
    protected $definition;

    /**
     * @var string
     */
    protected $value;

    /**
     * The __toString method allows a class to decide how it will react when it is converted to a string.
     *
     * @return string
     * @link http://php.net/manual/en/language.oop5.magic.php#language.oop5.magic.tostring
     */
    function __toString()
    {
        return $this->definition->getName();
    }

    /**
     * Returns the attribute unique id.
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
    public function setDefinition(DefinitionInterface $definition = null)
    {
        $this->definition = $definition;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDefinition()
    {
        return $this->definition;
    }

    /**
     * {@inheritdoc}
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue()
    {
        return $this->value;
    }

}