<?php

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

return function (): ArrayNodeDefinition {

    $builder = new TreeBuilder('columns');
    $node = $builder->getRootNode();

    $node
        ->info("Specifies the configuration for the columns system")
        ->addDefaultsIfNotSet()->children()
            
            ->booleanNode('sizes')
                ->info("Enable columns sizes classes")
                ->defaultTrue()
            ->end()
                
            ->booleanNode('offset')
                ->info("Enable columns offset classes")
                ->defaultTrue()
            ->end()
                
            ->booleanNode('shift')
                ->info("Enable columns shift classes")
                ->defaultTrue()
            ->end()
            
        ->end();

    return $node;
};