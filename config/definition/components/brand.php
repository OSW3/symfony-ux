<?php

use OSW3\UX\Enum\Size;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

return function (): ArrayNodeDefinition {

    $builder = new TreeBuilder('brand');
    $node = $builder->getRootNode();

    $node
        ->info("Parameters settings of the Brand component.")
        ->addDefaultsIfNotSet()->children()

        ->scalarNode('direction')
            ->info("Sets the flexbox or grid direction globally.")
            ->defaultValue('row')
        ->end()

        ->arrayNode('figures')
            ->useAttributeAsKey('name')
            ->scalarPrototype() ->end()
        ->end()

        ->booleanNode('hasHiddenText')
            ->defaultFalse()
        ->end()

        ->scalarNode('justify')
            ->info("Sets the flexbox or grid direction globally.")
            ->defaultValue('start')
        ->end()

        ->scalarNode('name')
            ->info("Specifies the name of the company")
            ->defaultNull()
        ->end()

        ->scalarNode('route')
            ->info("Specifies the route of the brand link")
            ->defaultNull()
        ->end()

        ->enumNode('size')
            ->info("Specifies the name of the company")
            ->values(Size::toArray())
            ->defaultValue(Size::MEDIUM->value)
        ->end()

        ->scalarNode('tag')
            ->info("Specifies the main tag")
            ->defaultValue('div')
        ->end()

        ->scalarNode('tagline')
            ->info("Specifies the tagline of the company")
            ->defaultNull()
        ->end()

        ->scalarNode('url')
            ->info("Specifies the url of the brand link")
            ->defaultNull()
        ->end()
    
    ->end();

    return $node;
};