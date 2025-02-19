<?php

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

return function (): ArrayNodeDefinition {
    $builder = new TreeBuilder('header');
    $node = $builder->getRootNode();

    $node
        ->info("Parameters settings of the Header component.")
        ->addDefaultsIfNotSet()->children()

            ->variableNode('brand')
                ->info("Specifies the properties of the Brand component.")
                ->defaultNull()
            ->end()

            ->scalarNode('container')
                ->info("Specifies the type of the container.")
                ->defaultNull()
            ->end()

            ->enumNode('mobileDisplay')
                ->info("Specifies the display mode on mobile.")
                ->values(['offcanvas-left', 'offcanvas-right', 'collapse-top'])
                ->defaultNull('offcanvas-left')
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