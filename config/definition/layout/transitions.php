<?php

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

return function (): ArrayNodeDefinition {

    $builder = new TreeBuilder('transitions');
    $node = $builder->getRootNode();

    $node
        // ->info("Parameters settings of the Copyright component.")
        ->addDefaultsIfNotSet()->children()

        ->floatNode('base')
            ->info("Specifies the base speed of the transition")
            ->min(0)
            ->defaultValue(1)
        ->end()

        ->floatNode('slow')
            ->info("Specifies the multiplier of the \"slow\" transition")
            ->min(0)
            ->defaultValue(0.8)
        ->end()

        ->floatNode('normal')
            ->info("Specifies the multiplier of the \"normal\" transition")
            ->min(0)
            ->defaultValue(0.3)
        ->end()

        ->floatNode('fast')
            ->info("Specifies the multiplier of the \"fast\" transition")
            ->min(0)
            ->defaultValue(0.1)
        ->end()

    ->end();

    return $node;
};