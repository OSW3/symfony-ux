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

            ->scalarNode('expandAt')
                ->info("Specifies the breakpoint to expand or toggle between mobile and desktop views.")
                ->defaultNull()
            ->end()

            ->enumNode('placement')
                ->info("Defines the mobile placement of the component (left, right, top).")
                ->values(['left', 'right', 'top'])
                ->defaultValue('left')
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