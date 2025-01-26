<?php

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

return function (): ArrayNodeDefinition {

    $builder = new TreeBuilder('rotators');
    $node = $builder->getRootNode();

    $node
        ->info("Parameters settings of the Rotators component.")
        ->addDefaultsIfNotSet()->children()

        ->integerNode('delay')
            ->info("Set the delay before next message")
            ->min(0)
            ->defaultValue(3000)
        ->end()

        ->booleanNode('loop')
            ->info("Set whether the ticker will be played in loop")
            ->defaultTrue()
        ->end()

        ->booleanNode('pause_hover')
            ->info("Set whether the ticker will be paused on mouseover")
            ->defaultTrue()
        ->end()
    ->end();

    return $node;
};