<?php

use OSW3\UX\Enum\Size;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

return function (): ArrayNodeDefinition {

    $builder = new TreeBuilder('rating');
    $node = $builder->getRootNode();

    $node
        ->info("Parameters settings of Rating component.")
        ->addDefaultsIfNotSet()->children()

        ->enumNode('size')
            ->info("Specifies the size of the component")
            ->values(Size::toArray())
            ->defaultValue(Size::MEDIUM->value)
        ->end()

        ->integerNode('ratingScale')
            ->info("Set the rating scale")
            ->min(1)
            ->defaultValue(5)
        ->end()

        ->integerNode('length')
            ->info("Set the number of rating selectors")
            ->min(1)
            ->defaultValue(5)
        ->end()

        ->booleanNode('tooltip')
            ->info("Set the tooltip active")
            ->defaultTrue()
        ->end()

        ->booleanNode('counter')
            ->info("Set the counter view active")
            ->defaultTrue()
        ->end()

        ->booleanNode('legend')
            ->info("Set the label view active")
            ->defaultTrue()
        ->end()


        ->arrayNode('legends')
            ->info("Define the labels for the rating scale")
            ->arrayPrototype()
                ->children()
                    ->integerNode('value')->isRequired()->end()
                    ->scalarNode('label')->isRequired()->end()
                ->end()
            ->end()
            ->defaultValue([
                ['value' => 1, 'label' => 'Terrible'],
                ['value' => 2, 'label' => 'Bad'],
                ['value' => 3, 'label' => 'OK'],
                ['value' => 4, 'label' => 'Good'],
                ['value' => 5, 'label' => 'Excellent'],
            ])
        ->end()

    ->end();

    return $node;
};