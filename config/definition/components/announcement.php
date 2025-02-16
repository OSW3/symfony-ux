<?php

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use OSW3\UX\Enum\Announcement\Animation\Strategy as AnimationStrategy;
use OSW3\UX\Enum\Announcement\Animation\Type as AnimationType;

return function (): ArrayNodeDefinition {

    $builder = new TreeBuilder('announcement');
    $node = $builder->getRootNode();

    $node
        ->info("Parameters settings of Announcement component.")
        ->addDefaultsIfNotSet()->children()

        ->enumNode('animated')
            ->info("Set the animation strategy.")
            ->values(AnimationStrategy::toArray())
            ->defaultValue(AnimationStrategy::ALWAYS->value)
        ->end()

        ->enumNode('animation')
            ->info("Set the animation type.")
            ->values(AnimationType::toArray())
            ->defaultValue(AnimationType::TICKER->value)
        ->end()

        ->integerNode('speed')
            // ->info("Set the animation dismiss.")
            ->min(0)
            ->defaultValue(500)
        ->end()

        ->booleanNode('pause_hover')
            ->info("Set whether the ticker/rotator will be paused on mouseover")
            ->defaultTrue()
        ->end()

        ->scalarNode('entity')
            ->info("Set the entity of announcement message storage.")
            ->defaultNull()
        ->end()

    ->end();

    return $node;
};