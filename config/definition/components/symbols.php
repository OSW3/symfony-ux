<?php

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

return function (): ArrayNodeDefinition {

    $builder = new TreeBuilder('symbols');
    $node = $builder->getRootNode();

    $node
        ->info("Parameters settings of the Symbols (svg) component.")
        ->addDefaultsIfNotSet()->children()

        ->scalarNode('path')
            ->info("Set the path of svg files source")
            ->defaultValue(null)
        ->end()

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