<?php

namespace Bavarian\Bundle\AttributeBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class BavarianAttributeExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        if ('custom' !== $config['driver']) {
            $loader->load(sprintf('%s.xml', $config['driver']));
            $container->setParameter(sprintf('%s.%s_enabled', $this->getAlias(), $config['driver']), true);
        }

        $this->remapParametersNamespaces($config, $container, array(
            ''          => array(
                'driver'        => 'bavarian_attribute.storage',
                'manager_name'  => 'bavarian_attribute.manager_name',
            ),
        ));

        $container->setParameter('bavarian_attribute.mappings', $config['mappings']);
        $this->remapClasses($container, $config['classes']);
    }

    protected function remapParameters(array $config, ContainerBuilder $container, array $map)
    {
        foreach ($map as $name => $paramName) {
            if (array_key_exists($name, $config)) {
                $container->setParameter($paramName, $config[$name]);
            }
        }
    }

    protected function remapParametersNamespaces(array $config, ContainerBuilder $container, array $namespaces)
    {
        foreach ($namespaces as $ns => $map) {
            if ($ns) {
                if (!array_key_exists($ns, $config)) {
                    continue;
                }
                $namespaceConfig = $config[$ns];
            } else {
                $namespaceConfig = $config;
            }

            if (is_array($map)) {
                $this->remapParameters($namespaceConfig, $container, $map);
            } else {
                foreach ($namespaceConfig as $name => $value) {
                    $container->setParameter(sprintf($map, $name), $value);
                }
            }
        }
    }

    protected function remapClasses(ContainerBuilder $container, array $classes, $modelAlias = null)
    {
        foreach ($classes as $service => $class) {
            if (is_array($class)) {
                $this->remapClasses($container, $class, $service);
                continue;
            }

            // Create class parameter
            $container->setParameter(
                sprintf('bavarian_attribute.%s.%s.class', $modelAlias, $service),
                $class
            );

            if ($service === 'repository') {
                $definition = new Definition($container->getParameter(sprintf('bavarian_attribute.%s.%s.class', $modelAlias, $service)));
                $definition->addMethodCall('getRepository', array(
                    $container->getParameter(sprintf('bavarian_attribute.%s.model.class', $modelAlias, $service))
                ));

                $container->setDefinition(sprintf('bavarian_attribute.repository.%s', $modelAlias), $definition);
            }
        }
    }
}
