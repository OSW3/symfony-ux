<?php

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

return function (): ArrayNodeDefinition {

    $builder = new TreeBuilder('analytics');
    $node = $builder->getRootNode();

    $node
        ->info("Parameters settings of the Analytics component.")
        ->addDefaultsIfNotSet()->children()
        
        ->arrayNode('clicky')
            ->info("Parameters settings of the Analytics service https://clicky.com.")
            ->addDefaultsIfNotSet()->children()

            ->scalarNode('tracking_id')
                ->info("Specifies the tracking ID for clicky.com")
                ->defaultNull()
            ->end()

        ->end()->end()
        
        ->arrayNode('google')
            ->info("Parameters settings of the Analytics service https://analytics.google.com/.")
            ->addDefaultsIfNotSet()->children()

            ->scalarNode('tracking_id')
                ->info("Specifies the tracking ID")
                ->defaultNull()
            ->end()

        ->end()->end()
        
        ->arrayNode('go_squared')
            ->info("Parameters settings of the Analytics service https://www.gosquared.com.")
            ->addDefaultsIfNotSet()->children()

            ->scalarNode('tracking_id')
                ->info("Specifies the tracking ID for gosquared.com")
                ->defaultNull()
            ->end()

        ->end()->end()
        
        ->arrayNode('heap')
            ->info("Parameters settings of the Analytics service https://heap.io/.")
            ->addDefaultsIfNotSet()->children()

            ->scalarNode('tracking_id')
                ->info("Specifies the tracking ID for heap.io")
                ->defaultNull()
            ->end()

        ->end()->end()
        
        ->arrayNode('matomo')
            ->info("Parameters settings of the Analytics service https://matomo.org/.")
            ->addDefaultsIfNotSet()->children()

            ->scalarNode('tracking_url')
                ->info("Specifies the tracking URL provided by matomo (something like: https://mysite.matomo.cloud/)")
                ->defaultNull()
            ->end()

            ->scalarNode('tracking_id')
                ->info("Specifies the tracking Site ID")
                ->defaultNull()
            ->end()

        ->end()->end()
        
        ->arrayNode('piwik')
            ->info("Parameters settings of the Analytics service https://piwik.pro/.")
            ->addDefaultsIfNotSet()->children()

            ->scalarNode('tracking_url')
                ->info("Specifies the tracking URL provided by matomo (something like: https://mysite.containers.piwik.pro/)")
                ->defaultNull()
            ->end()

            ->scalarNode('tracking_id')
                ->info("Specifies the tracking Site ID")
                ->defaultNull()
            ->end()

        ->end()->end()
        
        ->arrayNode('plausible')
            ->info("Parameters settings of the Analytics service https://plausible.io/.")
            ->addDefaultsIfNotSet()->children()

            ->scalarNode('tracking_domain')
                ->info("Specifies the tracking Domain(something like: /mysite.com/)")
                ->defaultNull()
            ->end()

        ->end()->end()
        
        ->arrayNode('woopra')
            ->info("Parameters settings of the Analytics service https://woopra.com/.")
            ->addDefaultsIfNotSet()->children()

            ->scalarNode('tracking_domain')
                ->info("Specifies the tracking Domain(something like: /mysite.com/)")
                ->defaultNull()
            ->end()

        ->end()->end()
    ->end();

    return $node;
};