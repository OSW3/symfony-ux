<?php

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

return function (): ArrayNodeDefinition {

    $builder = new TreeBuilder('breadcrumb');
    $node = $builder->getRootNode();

    $node
        ->info("Parameters settings of the Breadcrumb component.")
        ->addDefaultsIfNotSet()->children()

        ->scalarNode('separator')
            ->info("Specifies the separator symbol")
            ->defaultValue("'›'")
        ->end()

        ->arrayNode('home')
            ->addDefaultsIfNotSet()->children()

            ->scalarNode('label')
                ->info("Specifies the base label")
                ->defaultNull()
            ->end()

            ->scalarNode('icon')
                ->info("Specifies the base icon")
                ->defaultNull()
            ->end()

            ->scalarNode('url')
                ->info("Specifies the base URL")
                ->defaultValue("#")
            ->end()

            ->scalarNode('route')
                ->info("Specifies the base route name")
                ->defaultNull()
            ->end()

        ->end()->end()

    
    ->end();

    return $node;
};