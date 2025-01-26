<?php

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

return function (): ArrayNodeDefinition {

    $builder = new TreeBuilder('grid');
    $node = $builder->getRootNode();

    $node
        ->info("Specifies the configuration for the default theme")
        ->addDefaultsIfNotSet()->children()

            ->scalarNode('divisions') 
                ->info("Specifies the number of division of the grid system")
                ->defaultValue(12) 
            ->end()
            
        ->end();

    return $node;
};