<?php

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

return function (): ArrayNodeDefinition {

    $builder = new TreeBuilder('breakpoints');
    $node = $builder->getRootNode();

    $node
        // ->info("Parameters settings of the Copyright component.")
        ->addDefaultsIfNotSet()->children()

        ->arrayNode('base')->addDefaultsIfNotSet()->children()
            ->arrayNode('phone')->addDefaultsIfNotSet()->children()
                ->scalarNode('name')->defaultValue('phone')->end()
                ->integerNode('breakpoint')->defaultValue(576)->end()
                ->integerNode('container')->defaultValue(540)->end()
            ->end()->end()

            ->arrayNode('tablet')->addDefaultsIfNotSet()->children()
                ->scalarNode('name')->defaultValue('tablet')->end()
                ->integerNode('breakpoint')->defaultValue(768)->end()
                ->integerNode('container')->defaultValue(720)->end()
            ->end()->end()

            ->arrayNode('laptop')->addDefaultsIfNotSet()->children()
                ->scalarNode('name')->defaultValue('laptop')->end()
                ->integerNode('breakpoint')->defaultValue(992)->end()
                ->integerNode('container')->defaultValue(960)->end()
            ->end()->end()

            ->arrayNode('desktop')->addDefaultsIfNotSet()->children()
                ->scalarNode('name')->defaultValue('desktop')->end()
                ->integerNode('breakpoint')->defaultValue(1200)->end()
                ->integerNode('container')->defaultValue(1140)->end()
            ->end()->end()

            ->arrayNode('wide')->addDefaultsIfNotSet()->children()
                ->scalarNode('name')->defaultValue('wide')->end()
                ->integerNode('breakpoint')->defaultValue(1400)->end()
                ->integerNode('container')->defaultValue(1440)->end()
            ->end()->end()

            ->arrayNode('ultra')->addDefaultsIfNotSet()->children()
                ->scalarNode('name')->defaultValue('ultra')->end()
                ->integerNode('breakpoint')->defaultValue(1600)->end()
                ->integerNode('container')->defaultValue(1520)->end()
            ->end()->end()
        ->end()->end()

        ->arrayNode('additional')
            ->useAttributeAsKey('name')
            ->arrayPrototype()
                ->children()
                    ->integerNode('breakpoint')
                        ->isRequired()
                    ->end()
                    ->integerNode('container')
                        ->isRequired()
                    ->end()
                ->end()
            ->end()
        ->end()

        ->arrayNode('useless')
            ->scalarPrototype()->end()
        ->end()

    ->end();

    return $node;
};