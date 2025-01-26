<?php

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

return function (): ArrayNodeDefinition {

    $builder = new TreeBuilder('scroll_to_top');
    $node = $builder->getRootNode();

    $node
        ->info("Parameters settings of the ScrollToTop component.")
        ->addDefaultsIfNotSet()->children()

        ->enumNode('shape')
            ->info("Specifies the shape of the button")
            ->values(['square', 'circle'])
            ->defaultValue('square')
        ->end()

        ->enumNode('position')
            ->info("Specifies the position of the button")
            ->values(['top-left','top-center','top-right','middle-left','middle-center','centered','middle-right','bottom-left','bottom-center','bottom-right'])
            ->defaultValue('bottom-right')
        ->end()

        ->enumNode('transition')
            ->info("Specifies the transition type animation")
            ->values(['natural', 'inverse', 'left', 'right'])
            ->defaultValue('natural')
        ->end()

        ->integerNode('top_at')
            ->info("Specifies the position of the top of the page")
            ->defaultValue(0)
        ->end()

        ->integerNode('toggle_at')
            ->info("Specifies the position of the button's display or hiding point on the page")
            ->defaultValue(200)
        ->end()

        ->scalarNode('symbol')
            ->info("Specifies the symbol of the button")
            ->defaultValue("arrow-up")
        ->end()

        ->scalarNode('title')
            ->info("Specifies the title attribute value")
            ->defaultValue("Go to top")
        ->end()
    
    ->end();

    return $node;
};