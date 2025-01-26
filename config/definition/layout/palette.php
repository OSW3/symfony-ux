<?php

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

return function (): ArrayNodeDefinition {

    $builder = new TreeBuilder('ui_colors');
    $node = $builder->getRootNode();

    $node
        // ->info("Parameters settings of the Copyright component.")
        ->addDefaultsIfNotSet()->children()

        ->arrayNode('defaults')->addDefaultsIfNotSet()->children()

            ->scalarNode('success')
                ->defaultValue('success')
            ->end()
            ->scalarNode('danger')
                ->defaultValue('danger')
            ->end()
            ->scalarNode('warning')
                ->defaultValue('warning')
            ->end()
            ->scalarNode('info')
                ->defaultValue('info')
            ->end()
            ->scalarNode('primary')
                ->defaultValue('primary')
            ->end()
            ->scalarNode('secondary')
                ->defaultValue('secondary')
            ->end()
            ->scalarNode('light')
                ->defaultValue('light')
            ->end()
            ->scalarNode('dark')
                ->defaultValue('dark')
            ->end()
            ->scalarNode('muted')
                ->defaultValue('muted')
            ->end()

        ->end()->end()

        ->arrayNode('additional')
            ->useAttributeAsKey('name')
            ->scalarPrototype()->end()
        ->end()

        ->arrayNode('useless')
            ->scalarPrototype()->end()
        ->end()

    ->end();

    return $node;
};