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

        ->booleanNode('palette')
            ->info("Set whether Alerts palette can be generated.")
            ->defaultTrue()
        ->end()

        ->booleanNode('sizes')
            ->info("Set whether Alerts sizes is enable.")
            ->defaultTrue()
        ->end()

        ->integerNode('delay')
            ->info("Set the delay (in second) before alerts are automatically dismiss.")
            ->min(0)
            ->defaultValue(0)
        ->end()
    
    ->end();

    return $node;
};