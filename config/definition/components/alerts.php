<?php

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

return function (): ArrayNodeDefinition {

    $builder = new TreeBuilder('alerts');
    $node = $builder->getRootNode();

    $node
        ->info("Parameters settings of Alerts component.")
        ->addDefaultsIfNotSet()->children()

        ->booleanNode('dismissible')
            ->info("Set whether Alerts can be dismissible by default.")
            ->defaultTrue()
        ->end()

        ->integerNode('duration')
            ->info("Set the duration (in second) before alerts are automatically dismiss.")
            ->min(0)
            ->defaultValue(0)
        ->end()
    
    ->end();

    return $node;
};