<?php

use OSW3\UX\Enum\PlacementLayout;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

return function (): ArrayNodeDefinition {

    $builder = new TreeBuilder('toast');
    $node = $builder->getRootNode();

    $node
        ->info("Parameters settings of the Toast component.")
        ->addDefaultsIfNotSet()->children()

        ->enumNode('placement')
            ->info("Specifies the placement of the toast container")
            ->values(PlacementLayout::toArray())
            ->defaultValue(PlacementLayout::TOP_RIGHT->value)
        ->end()

        ->floatNode('duration')
            ->info("Set the delay before hiding the toast")
            ->min(0)
            ->defaultValue(2.5)
        ->end()

        ->floatNode('delay')
            ->info("Set the delay before hiding the toast")
            ->min(0)
            ->defaultValue(0.3)
        ->end()

        ->scalarNode('icon')
            ->info("Set the default icon")
            ->defaultNull()
        ->end()
        ->scalarNode('icon_size')
            ->info("Set the size of the icon")
            ->defaultValue('32px')
        ->end()
    
    ->end();

    return $node;
};