<?php

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

return function (): ArrayNodeDefinition {

    $builder = new TreeBuilder('spacer');
    $node = $builder->getRootNode();

    $node
        // ->info("Parameters settings of the Copyright component.")
        ->addDefaultsIfNotSet()->children()

        ->floatNode('base')
            ->info("Specifies the base of spacer in 'rem'")
            ->min(0)
            ->defaultValue(1)
        ->end()

        ->floatNode('spacer_1')
            ->info("Specifies the multiplier of spacer-1")
            ->min(0)
            ->defaultValue(0.25)
        ->end()

        ->floatNode('spacer_2')
            ->info("Specifies the multiplier of spacer-2")
            ->min(0)
            ->defaultValue(0.5)
        ->end()

        ->floatNode('spacer_3')
            ->info("Specifies the multiplier of spacer-3")
            ->min(0)
            ->defaultValue(1)
        ->end()

        ->floatNode('spacer_4')
            ->info("Specifies the multiplier of spacer-4")
            ->min(0)
            ->defaultValue(1.5)
        ->end()

        ->floatNode('spacer_5')
            ->info("Specifies the multiplier of spacer-5")
            ->min(0)
            ->defaultValue(2)
        ->end()

        ->floatNode('spacer_6')
            ->info("Specifies the multiplier of spacer-6")
            ->min(0)
            ->defaultValue(3)
        ->end()

    ->end();

    return $node;
};