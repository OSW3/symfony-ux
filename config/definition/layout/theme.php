<?php

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

return function (): ArrayNodeDefinition {

    $builder = new TreeBuilder('theme');
    $node = $builder->getRootNode();

    $node
        ->info("Specifies the configuration for the default theme")
        ->addDefaultsIfNotSet()->children()

            ->scalarNode('default') 
                ->info("Specifies the name of the default theme")
                ->defaultValue('light') 
            ->end()
            
        ->end();

    return $node;
};