<?php

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

return function (): ArrayNodeDefinition {

    $builder = new TreeBuilder('search');
    $node = $builder->getRootNode();

    $node
        ->info("Parameters settings of the Search component.")
        ->addDefaultsIfNotSet()->children()

        ->enumNode('type')
            ->info("Specifies the type of the search component")
            ->values(['basic', 'list', 'modal'])
            ->defaultValue('basic')
        ->end()


        ->booleanNode('shortcut')
            ->info("Specifies whether shortcut is enabled")
            ->defaultTrue()
        ->end()

        // ->booleanNode('modal')
        //     ->info("Specifies whether a modal is enabled")
        //     ->defaultTrue()
        // ->end()

        ->enumNode('method')
            ->info("Specifies the request method")
            ->values(['get', 'post'])
            ->defaultValue('get')
        ->end()

        ->scalarNode('param')
            ->info("Specifies the request parameter")
            ->defaultValue('q')
        ->end()

        ->scalarNode('placeholder')
            ->info("Specifies the placeholder")
            ->defaultValue('Search for something')
        ->end()

        ->booleanNode('autocomplete')
            ->info("Specifies whether the autocomplete is allowed")
            ->defaultTrue()
        ->end()

        ->scalarNode('label')
            ->info("Specifies the label of the submit button")
            ->defaultValue('Search')
        ->end()
    ->end();

    return $node;
};