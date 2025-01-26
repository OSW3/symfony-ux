<?php

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

return function (): ArrayNodeDefinition {

    $builder = new TreeBuilder('copyright');
    $node = $builder->getRootNode();

    $node
        ->info("Parameters settings of the Copyright component.")
        ->addDefaultsIfNotSet()->children()

        ->scalarNode('company')
            ->info("Specifies the name of the company")
            ->defaultNull()
        ->end()

        ->scalarNode('since')
            ->info("Specifies the first date")
            ->defaultValue(date("Y"))
        ->end()
        
        ->scalarNode('symbol')
            ->info("Specifies the copyright symbol")
            ->defaultValue("&copy;")
        ->end()

        ->scalarNode('dates_separator')
            ->info("Specifies the separator between two date (e.g.: 2009-2024)")
            ->defaultValue("-")
        ->end()

        ->scalarNode('separator')
            ->info("Specifies the separator between two date (e.g.: 2009-2024)")
            ->defaultValue(" • ")
        ->end()
    
    ->end();

    return $node;
};