<?php 

return static function($definition)
{
    $definition->rootNode()->children()

        ->arrayNode('copyright')
            ->info("Parameters settings of the Copyright component.")
            ->addDefaultsIfNotSet()->children()

            ->scalarNode('company')
                ->info("Specifies the name of the company")
                ->defaultNull()
            ->end()

            ->scalarNode('since')
                ->info("Specifies the first date")
                ->defaultValue(date("Y"))
            ->end()
            
            ->scalarNode('symbol')
                ->info("Specifies the copyright symbol")
                ->defaultValue("&copy;")
            ->end()

            ->scalarNode('dates_separator')
                ->info("Specifies the separator between two date (e.g.: 2009-2024)")
                ->defaultValue("-")
            ->end()

            ->scalarNode('separator')
                ->info("Specifies the separator between two date (e.g.: 2009-2024)")
                ->defaultValue(" • ")
            ->end()

        ->end()->end()

        ->arrayNode('scroll_to_top')
            ->info("Parameters settings of the ScrollToTop component.")
            ->addDefaultsIfNotSet()->children()

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
                ->defaultValue("&ShortUpArrow;")
            ->end()

            ->scalarNode('title')
                ->info("Specifies the title attribute value")
                ->defaultValue("Go to top")
            ->end()

        ->end()->end()

    ->end();
};