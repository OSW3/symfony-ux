<?php

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

return function (): ArrayNodeDefinition {

    $builder = new TreeBuilder('accordions');
    $node = $builder->getRootNode();

    $node
        ->info("Parameters settings of Accordions component.")
        ->addDefaultsIfNotSet()->children()

        ->booleanNode('multiple')
            ->info("Set whether Accordions can open multiple items in same time.")
            ->defaultFalse()
        ->end()

        ->arrayNode('header')
            ->addDefaultsIfNotSet()->children()

            ->scalarNode('tag')
                ->info("Set the tag type of items header.")
                ->defaultValue('h2')
            ->end()

        ->end()->end()

        ->arrayNode('content')
            ->addDefaultsIfNotSet()->children()

            ->scalarNode('max_height')
                ->info("Set the max height of items content.")
                ->defaultNull()
                ->validate()
                    ->ifTrue(fn($v) => !is_null($v) && (!is_int($v) || $v < 0))
                    ->thenInvalid('The max_height must be a positive integer or null.')
                ->end()
            
            ->end()

        ->end()->end()

    ->end();

    return $node;
};