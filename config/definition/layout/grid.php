<?php

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

return function (): ArrayNodeDefinition {

    $builder = new TreeBuilder('grid');
    $node = $builder->getRootNode();

    $node
        ->info("Specifies the configuration for the grid system")
        ->addDefaultsIfNotSet()->children()

            ->scalarNode('divisions') 
                ->info("Specifies the number of division of the grid system")
                ->defaultValue(12) 
            ->end()
            
            ->booleanNode('columns')
                ->info("Enable grid columns classes")
                ->defaultTrue()
            ->end()
            
            ->booleanNode('alignments')
                ->info("Enable grid alignments class")
                ->defaultTrue()
            ->end()
            
        ->end();

    return $node;
};