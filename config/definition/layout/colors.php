<?php

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

return function (): ArrayNodeDefinition {

    $builder = new TreeBuilder('colors');
    $node = $builder->getRootNode();

    $node
        // ->info("Parameters settings of the Copyright component.")
        ->addDefaultsIfNotSet()->children()

        ->arrayNode('defaults')->addDefaultsIfNotSet()->children()

            ->scalarNode('blue')->defaultValue('#0d6efd')->end()
            ->scalarNode('indigo')->defaultValue('#6610f2')->end()
            ->scalarNode('purple')->defaultValue('#6f42c1')->end()
            ->scalarNode('pink')->defaultValue('#d63384')->end()
            ->scalarNode('red')->defaultValue('#dc3545')->end()
            ->scalarNode('orange')->defaultValue('#fd7e14')->end()
            ->scalarNode('yellow')->defaultValue('#ffc107')->end()
            ->scalarNode('green')->defaultValue('#198754')->end()
            ->scalarNode('teal')->defaultValue('#20c997')->end()
            ->scalarNode('cyan')->defaultValue('#0dcaf0')->end()

            ->scalarNode('black')->defaultValue('#111111')->end()
            ->scalarNode('white')->defaultValue('#ffffff')->end()
            ->scalarNode('gray_100')->defaultValue('#f8f9fa')->end()
            ->scalarNode('gray_200')->defaultValue('#e9ecef')->end()
            ->scalarNode('gray_300')->defaultValue('#dee2e6')->end()
            ->scalarNode('gray_400')->defaultValue('#ced4da')->end()
            ->scalarNode('gray_500')->defaultValue('#adb5bd')->end()
            ->scalarNode('gray_600')->defaultValue('#6c757d')->end()
            ->scalarNode('gray_700')->defaultValue('#495057')->end()
            ->scalarNode('gray_800')->defaultValue('#343a40')->end()
            ->scalarNode('gray_900')->defaultValue('#212529')->end()

        ->end()->end()

        ->arrayNode('additional')
            ->useAttributeAsKey('name')
            ->scalarPrototype()->end()
        ->end()

        ->arrayNode('shades')
            ->useAttributeAsKey('name')
            ->arrayPrototype()
                ->prototype('integer')
                    ->validate()
                        ->ifTrue(function($v) { return $v < 0 || $v > 100; })
                        ->thenInvalid('Shades values must be between 0 and 100')
                    ->end()
                ->end()
            ->end()
        ->end()

        ->arrayNode('tints')
            ->useAttributeAsKey('name')
            ->arrayPrototype()
                ->prototype('integer')
                    ->validate()
                        ->ifTrue(function($v) { return $v < 0 || $v > 100; })
                        ->thenInvalid('Shades values must be between 0 and 100')
                    ->end()
                ->end()
            ->end()
        ->end()

        ->arrayNode('useless')
            ->scalarPrototype()->end()
        ->end()

    ->end();

    return $node;
};