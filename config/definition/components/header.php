<?php

use OSW3\UX\Enum\PlacementX;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

return function (): ArrayNodeDefinition {
    $builder = new TreeBuilder('header');
    $node = $builder->getRootNode();

    $node
        ->info("Parameters settings of the Header component.")
        ->addDefaultsIfNotSet()->children()

            ->variableNode('backdrop')
                ->info("Indicates whether a blurred background should be displayed when the component is visible.	.")
                ->defaultTrue()
            ->end()

            ->variableNode('brand')
                ->info("Specifies the properties of the Brand component.")
                ->defaultTrue()
            ->end()

            ->scalarNode('container')
                ->info("Specifies the type of the container.")
                ->defaultNull()
            ->end()

            ->scalarNode('expandAt')
                ->info("Specifies the breakpoint to expand or toggle between mobile and desktop views.")
                ->defaultNull()
            ->end()

            ->enumNode('placement')
                ->info("Specifies the default position of Offcanvas")
                ->values(PlacementX::toArray())
                ->defaultValue(PlacementX::LEFT->value)
            ->end()

            ->booleanNode('sticky')
                ->info("Specifies wether is the sticky header.")
                ->defaultFalse()
            ->end()

            ->scalarNode('tag')
                ->info("Specifies the header tag type.")
                ->defaultValue('header')
            ->end()

        ->end();

    return $node;
};