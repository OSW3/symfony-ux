<?php

use OSW3\UX\Enum\PlacementX;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

return function (): ArrayNodeDefinition {
    $builder = new TreeBuilder('navbar');
    $node = $builder->getRootNode();

    $node
        ->info("Parameters settings of the Navbar component.")
        ->addDefaultsIfNotSet()->children()

            ->variableNode('backdrop')
                ->info("Indicates whether a blurred background should be displayed when the component is visible.	.")
                ->defaultTrue()
            ->end()

            ->variableNode('brand')
                ->info("Defines the properties of the Brand component.")
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
                ->info("Specifies wether is the sticky navbar.")
                ->defaultFalse()
            ->end()

            ->scalarNode('tag')
                ->info("Specifies the navbar tag type.")
                ->defaultValue('navbar')
            ->end()

        ->end();

    return $node;
};