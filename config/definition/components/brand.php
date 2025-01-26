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

        ->scalarNode('name')
            ->info("Specifies the name of the company")
            ->defaultNull()
        ->end()

        ->scalarNode('tagline')
            ->info("Specifies the tagline of the company")
            ->defaultNull()
        ->end()

        ->enumNode('size')
            ->info("Specifies the name of the company")
            ->values(Size::toArray())
            ->defaultValue(Size::MEDIUM->value)
        ->end()

        ->arrayNode('logo')
            ->useAttributeAsKey('name')
            ->scalarPrototype() 
        ->end()->end()

        ->scalarNode('url')
            ->info("Specifies the url of the brand link")
            ->defaultNull()
        ->end()

        ->scalarNode('route')
            ->info("Specifies the route of the brand link")
            ->defaultNull()
        ->end()
    
    ->end();

    return $node;
};