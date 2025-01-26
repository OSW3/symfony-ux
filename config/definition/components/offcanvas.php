<?php

use OSW3\UX\Enum\PlacementX;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

return function (): ArrayNodeDefinition {

    $builder = new TreeBuilder('offcanvas');
    $node = $builder->getRootNode();

    $node
        ->info("Parameters settings of the Offcanvas component.")
        ->addDefaultsIfNotSet()->children()

        ->enumNode('placement')
            ->info("Specifies the default position of Offcanvas")
            ->values(PlacementX::toArray())
            ->defaultValue(PlacementX::LEFT->value)
        ->end()

        ->enumNode('animation')
            ->info("Specifies the animation type")
            ->values(['none', 'slide'])
            ->defaultValue('slide')
        ->end()

        ->enumNode('speed')
            ->info("Specifies the animation speed")
            ->values(['slow','normal','fast','none'])
            ->defaultValue('normal')
        ->end()

        ->booleanNode('backdrop')
            ->info("Specifies wether the offcanvas has a backdrop")
            ->defaultTrue()
        ->end()

        ->booleanNode('is_showed')
            ->info("Specifies wether the offcanvas is showed by default")
            ->defaultFalse()
        ->end()
    
    ->end();

    return $node;
};