<?php

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

return function (): ArrayNodeDefinition {
    $builder = new TreeBuilder('links');
    $node = $builder->getRootNode();

    $node
        ->info("Parameters settings of the Links component.")
        ->addDefaultsIfNotSet()->children()

            ->scalarNode('target')
                ->info("Specifies the window target of links")
                ->defaultValue('_self')
            ->end()
            
        ->end();

    return $node;
};