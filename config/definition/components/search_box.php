<?php

use OSW3\UX\Enum\SearchBox\Type;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

return function (): ArrayNodeDefinition {

    $builder = new TreeBuilder('search_box');
    $node = $builder->getRootNode();

    $node
        ->info("Parameters settings of the Search Box component.")
        ->addDefaultsIfNotSet()->children()

        ->enumNode('type')
            ->info("Specifies the type of the search component")
            // ->isRequired()
            ->values(Type::toArray())
            ->defaultValue(Type::BASIC->value)
        ->end()

        ->scalarNode('shortcut')
            ->info("Specifies the type of the search component")
            ->defaultValue('K')
        ->end()

        ->booleanNode('voice')
            ->info("Specifies whether voice search is enabled")
            ->defaultTrue()
        ->end()

        ->arrayNode('history')
            ->info("Specifies settings of the Search Box history.")
            ->addDefaultsIfNotSet()->children()

            ->booleanNode('enable')
                ->info("Specifies whether the search history is enabled")
                ->defaultTrue()
            ->end()

            ->scalarNode('key')
                ->info("Specifies history key for the storage")
                ->defaultValue('sb-history')
            ->end()

            ->booleanNode('clearable')
                ->info("Specifies whether the search history is clearable by the user")
                ->defaultTrue()
            ->end()

            ->integerNode('length')
                ->info("Specifies the search history length")
                ->min(0)
                ->defaultValue(8)
            ->end()

            ->arrayNode('order')
                ->info("Specifies the search history order settings.")
                ->addDefaultsIfNotSet()->children()

                ->enumNode('type')
                    ->info("Specifies the type of the history order")
                    ->values(['alpha', 'date'])
                    ->defaultValue('date')
                ->end()

                ->enumNode('direction')
                    ->info("Specifies the direction of the history order")
                    ->values(['ASC', 'DESC'])
                    ->defaultValue('DESC')
                ->end()

            ->end()->end()
        ->end()->end()

        ->arrayNode('favorites')
            ->info("Specifies settings of the Search Box favorites.")
            ->addDefaultsIfNotSet()->children()

            ->booleanNode('enable')
                ->info("Specifies whether the search favorites is enabled")
                ->defaultTrue()
            ->end()

            ->scalarNode('key')
                ->info("Specifies favorites key for the storage")
                ->defaultValue('sb-favorites')
            ->end()
            
        ->end()->end()

        ->arrayNode('suggestions')
            ->info("Specifies settings of the Search Box suggestions.")
            ->addDefaultsIfNotSet()->children()

            ->booleanNode('enable')
                ->info("Specifies whether the search suggestions is enabled")
                ->defaultTrue()
            ->end()

            ->scalarNode('route')
                ->info("Specifies the suggestions route")
                ->defaultNull()
            ->end()

            ->scalarNode('url')
                ->info("Specifies the suggestions url")
                ->defaultNull()
            ->end()

            ->enumNode('format')
                ->info("Specifies the suggestions format")
                ->values(['json', 'xml', 'csv'])
                ->defaultValue('json')
            ->end()

            ->end()
            ->validate()
                ->ifTrue(function ($v) {
                    return $v['enable'] === true && empty($v['url']) && empty($v['route']);
                })
                ->thenInvalid('When "enable" is set to true, either "url" or "route" must be provided.')
            ->end()
        ->end()

        ->arrayNode('field')
            ->info("Specifies settings of the Search Box form.")
            ->addDefaultsIfNotSet()->children()

            ->arrayNode('symbol')
                ->info("Specifies settings of the Search Box form symbol / icon.")
                ->addDefaultsIfNotSet()->children()

                ->booleanNode('enable')
                    ->info("Specifies whether the symbol is enabled")
                    ->defaultTrue()
                ->end()
            
                ->enumNode('type')
                    ->info("Specifies the type of the symbol provider")
                    ->values(['webfont','image'])
                    ->defaultValue('webfont')
                ->end()
            
                ->scalarNode('icon')
                    ->info("Specifies the source / class of the symbol provider")
                    ->defaultValue('search')
                ->end()

            ->end()->end()

            ->scalarNode('placeholder')
                ->info("Specifies the search input placeholder attribute")
                ->defaultValue('Search for something')
            ->end()

            ->arrayNode('submit')
                ->info("Specifies the submit options.")
                ->addDefaultsIfNotSet()->children()

                ->arrayNode('symbol')
                    ->info("Specifies settings of the Search Box form symbol / icon.")
                    ->addDefaultsIfNotSet()->children()

                    ->booleanNode('enable')
                        ->info("Specifies whether the symbol is enabled")
                        ->defaultTrue()
                    ->end()
                
                    ->enumNode('type')
                        ->info("Specifies the type of the symbol provider")
                        ->values(['webfont','image'])
                        ->defaultValue('webfont')
                    ->end()
                
                    ->scalarNode('icon')
                        ->info("Specifies the source / class of the symbol provider")
                        ->defaultValue('search')
                    ->end()

                ->end()->end()

                ->arrayNode('label')
                    ->info("Specifies the submit label options.")
                    ->addDefaultsIfNotSet()->children()

                    ->scalarNode('text')
                        ->info("Specifies the submit label text.")
                        ->defaultValue('Search')
                    ->end()

                    ->scalarNode('toggle_at')
                        ->info("Specifies the breakpoint from which the submit label text is visible.")
                        ->defaultNull()
                    ->end()
                ->end()->end()

            ->end()->end()

        ->end()->end()

        ->arrayNode('request')
            ->info("Specifies settings of the Search Box request.")
            ->addDefaultsIfNotSet()->children()

            ->enumNode('method')
                ->info("Specifies the request method")
                ->values(['get', 'post'])
                ->defaultValue('get')
            ->end()

            ->scalarNode('param')
                ->info("Specifies the request parameter")
                ->defaultValue('query')
            ->end()

            ->scalarNode('route')
                ->info("Specifies the request route")
                ->defaultNull()
            ->end()

            ->scalarNode('url')
                ->info("Specifies the request url")
                ->defaultNull()
            ->end()

            ->end()
            ->validate()
                ->ifTrue(function ($v) {
                    return empty($v['route']) && empty($v['url']);
                })
                ->thenInvalid('Either "route" or "url" must be provided in the request settings.')
            ->end()

        ->end()

        ->arrayNode('advanced')
            ->info("Specifies settings of the Search Box advanced option.")
            ->addDefaultsIfNotSet()->children()

            ->booleanNode('enable')
                ->info("Specifies whether the advanced search is enabled")
                ->defaultFalse()
            ->end()

            ->scalarNode('template')
                ->info("Specifies the path of the template of the advanced form")
                ->defaultNull()
            ->end()
            
            ->end()
            ->validate()
                ->ifTrue(function ($v) {
                    return $v['enable'] === true && empty($v['template']);
                })
                ->thenInvalid('When "enable" is set to true, either "template" must be provided.')
            ->end()
        ->end()
    ->end();

    return $node;
};