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
interface DefinitionInterface
{

    /**
     * Sets the definition name.
     *
     * @param   string  $name
     *
     * @return  self
     */
    public function setName($name);

    /**
     * Gets the definition name.
     *
     * @return  string
     */
    public function getName();

    /**
     * Sets the definition description.
     *
     * @param   string  $description
     *
     * @return  self
     */
    public function setDescription($description);

    /**
     * Gets the definition description.
     *
     * @return  string
     */
    public function getDescription();

    /**
     * Sets the definition type.
     *
     * @param   string  $type
     *
     * @return  self
     */
    public function setType($type);

    /**
     * Gets the definition type.
     *
     * @return  string
     */
    public function getType();

    /**
     * Sets the definition value fill is required.
     *
     * @param   boolean $required
     *
     * @return  self
     */
    public function setRequired($required);

    /**
     * Answer to: definition value is required?
     *
     * @return  boolean
     */
    public function isRequired();

    /**
     * Sets the definition order index.
     *
     * @param   int     $order
     *
     * @return  self
     */
    public function setOrderIndex($order);

    /**
     * Gets the definition order index.
     *
     * @return  int
     */
    public function getOrderIndex();

    /**
     * Sets the definition schema.
     *
     * @param   SchemaInterface|null    $schema
     *
     * @return  self
     */
    public function setSchema(SchemaInterface $schema = null);

    /**
     * Gets the definition schema.
     *
     * @return  SchemaInterface
     */
    public function getSchema();

    /**
     * Sets the definition options. (choice type)
     *
     * @param   ArrayCollection     $options
     *
     * @return  self
     */
    public function setOptions(ArrayCollection $options);

    /**
     * Gets the schema options.
     *
     * @return  Option[]
     */
    public function getOptions();

    /**
     * Adds a option to the definition.
     *
     * @param   OptionInterface     $option
     *
     * @return  self
     */
    public function addOption(OptionInterface $option);

    /**
     * Removes a option to the definition.
     *
     * @param   OptionInterface     $option
     *
     * @return  self
     */
    public function removeOption(OptionInterface $option);

    /**
     * Check if the definition has specific option in your options collection.
     *
     * @param   OptionInterface     $option
     *
     * @return  self
     */
    public function hasOption(OptionInterface $option);

    /**
     * Sets the definition attributes.
     *
     * @param   ArrayCollection     $attributes
     *
     * @return  self
     */
    public function setAttributes(ArrayCollection $attributes);

    /**
     * Gets the schema attributes.
     *
     * @return  Attribute[]
     */
    public function getAttributes();

    /**
     * Adds an attribute to the definition.
     *
     * @param   AttributeInterface  $attribute
     *
     * @return  self
     */
    public function addAttribute(AttributeInterface $attribute);

    /**
     * Removes an attribute to the definition.
     *
     * @param   AttributeInterface  $attribute
     *
     * @return  self
     */
    public function removeAttribute(AttributeInterface $attribute);

    /**
     * Check if the definition has specific attribute in your attributes collection.
     *
     * @param   AttributeInterface  $attribute
     *
     * @return  self
     */
    public function hasAttribute(AttributeInterface $attribute);

}