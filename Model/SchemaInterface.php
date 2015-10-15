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
interface SchemaInterface
{

    /**
     * Sets the schema class name.
     *
     * @param   string  $className
     *
     * @return  self
     */
    public function setClassName($className);

    /**
     * Gets the schema class name.
     *
     * @return  string
     */
    public function getClassName();

    /**
     * Sets the schema definitions.
     *
     * @param   ArrayCollection     $definitions
     *
     * @return  self
     */
    public function setDefinitions(ArrayCollection $definitions);

    /**
     * Gets the schema definitions.
     *
     * @return  Definition[]
     */
    public function getDefinitions();

    /**
     * Check if the schema has specific definition in your definition collection.
     *
     * @param   DefinitionInterface $definition
     *
     * @return  boolean
     */
    public function hasDefinition(DefinitionInterface $definition);

    /**
     * Removes a definition to the schema.
     *
     * @param   DefinitionInterface $definition
     *
     * @return  self
     */
    public function removeDefinition(DefinitionInterface $definition);

    /**
     * Adds a definition to the schema.
     *
     * @param   DefinitionInterface $definition
     *
     * @return  self
     */
    public function addDefinition(DefinitionInterface $definition);

}