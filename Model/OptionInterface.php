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
interface OptionInterface
{

    /**
     * Sets the option name.
     *
     * @param   string $name
     *
     * @return  self
     */
    public function setName($name);

    /**
     * Gets the option name.
     *
     * @return  string
     */
    public function getName();

    /**
     * Sets the option value.
     *
     * @param   string $value
     *
     * @return  self
     */
    public function setValue($value);

    /**
     * Gets the option value.
     *
     * @return  string
     */
    public function getValue();

    /**
     * Sets the option definition.
     *
     * @param   DefinitionInterface|null    $definition
     *
     * @return  self
     */
    public function setDefinition(DefinitionInterface $definition = null);

    /**
     * Gets the option definition.
     *
     * @return  DefinitionInterface
     */
    public function getDefinition();

}