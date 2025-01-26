<?php

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

return function (): ArrayNodeDefinition {

    $builder = new TreeBuilder('tickers');
    $node = $builder->getRootNode();

    $node
        ->info("Parameters settings of the Tickers component.")
        ->addDefaultsIfNotSet()->children()

        ->integerNode('speed')
            ->info("Set the speed of scroll")
            ->min(0)
            ->defaultValue(15)
        ->end()

        ->integerNode('delay')
            ->info("Set the delay before next message")
            ->min(0)
            ->defaultValue(0)
        ->end()

        ->enumNode('direction')
            ->info("Set the scroll direction")
            ->values(['ltr', 'rtl'])
            ->defaultValue('rtl')
        ->end()

        ->booleanNode('loop')
            ->info("Set whether the ticker will be played in loop")
            ->defaultTrue()
        ->end()

        ->booleanNode('pause_hover')
            ->info("Set whether the ticker will be paused on mouseover")
            ->defaultTrue()
        ->end()
    
    ->end();

    return $node;
};