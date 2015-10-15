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
interface AttributeInterface
{

    /**
     * Sets the definition type of attribute.
     *
     * @param   DefinitionInterface $definition
     *
     * @return  self
     */
    public function setDefinition(DefinitionInterface $definition = null);

    /**
     * Gets the definition of attribute.
     *
     * @return  DefinitionInterface
     */
    public function getDefinition();

    /**
     * Sets the value of attribute.
     *
     * @param   string  $value
     *
     * @return  self
     */
    public function setValue($value);

    /**
     * Gets the attribute´s value.
     *
     * @return  string
     */
    public function getValue();

}