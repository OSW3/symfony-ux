<?php 

return static function($definition)
{
    $definition->rootNode()->children()

        ->scalarNode('prefix')
            ->info("Specifies the prefix")
            ->defaultValue('ux')
        ->end()

        ->arrayNode('layout')->addDefaultsIfNotSet()->children()

            /**
             * Breakpoints
             */
            ->arrayNode('breakpoints')
                ->addDefaultsIfNotSet()->children()

                    ->arrayNode('base')->addDefaultsIfNotSet()->children()
                        ->arrayNode('phone')->addDefaultsIfNotSet()->children()
                            ->scalarNode('name')->defaultValue('phone')->end()
                            ->integerNode('breakpoint')->defaultValue(576)->end()
                            ->integerNode('container')->defaultValue(540)->end()
                        ->end()->end()

                        ->arrayNode('tablet')->addDefaultsIfNotSet()->children()
                            ->scalarNode('name')->defaultValue('tablet')->end()
                            ->integerNode('breakpoint')->defaultValue(768)->end()
                            ->integerNode('container')->defaultValue(720)->end()
                        ->end()->end()

                        ->arrayNode('laptop')->addDefaultsIfNotSet()->children()
                            ->scalarNode('name')->defaultValue('laptop')->end()
                            ->integerNode('breakpoint')->defaultValue(992)->end()
                            ->integerNode('container')->defaultValue(960)->end()
                        ->end()->end()

                        ->arrayNode('desktop')->addDefaultsIfNotSet()->children()
                            ->scalarNode('name')->defaultValue('desktop')->end()
                            ->integerNode('breakpoint')->defaultValue(1200)->end()
                            ->integerNode('container')->defaultValue(1140)->end()
                        ->end()->end()

                        ->arrayNode('wide')->addDefaultsIfNotSet()->children()
                            ->scalarNode('name')->defaultValue('wide')->end()
                            ->integerNode('breakpoint')->defaultValue(1400)->end()
                            ->integerNode('container')->defaultValue(1440)->end()
                        ->end()->end()

                        ->arrayNode('ultra')->addDefaultsIfNotSet()->children()
                            ->scalarNode('name')->defaultValue('ultra')->end()
                            ->integerNode('breakpoint')->defaultValue(1600)->end()
                            ->integerNode('container')->defaultValue(1520)->end()
                        ->end()->end()
                    ->end()->end()

                    ->arrayNode('additional')
                        ->useAttributeAsKey('name')
                        ->arrayPrototype()
                            ->children()
                                ->integerNode('breakpoint')
                                    ->isRequired()
                                ->end()
                                ->integerNode('container')
                                    ->isRequired()
                                ->end()
                            ->end()
                        ->end()
                    ->end()

                    ->arrayNode('useless')
                        ->scalarPrototype()->end()
                    ->end()

                ->end()
            ->end()

            /**
             * Colors
             */

            /**
             * Fonts
             */

            /**
             * Grid divisions
             */
            ->integerNode('grid_divisions')
                ->info("Specifies the number of division of the grid system")
                ->defaultValue(12)
            ->end()

            /**
             * Pallet
             */

            /**
             * Spacer
             */
            ->arrayNode('spacer')
                ->addDefaultsIfNotSet()->children()

                    ->floatNode('base')
                        ->info("Specifies the base of spacer in 'rem'")
                        ->min(0)
                        ->defaultValue(1)
                    ->end()

                    ->floatNode('spacer_1')
                        ->info("Specifies the multiplier of spacer-1")
                        ->min(0)
                        ->defaultValue(0.25)
                    ->end()

                    ->floatNode('spacer_2')
                        ->info("Specifies the multiplier of spacer-2")
                        ->min(0)
                        ->defaultValue(0.5)
                    ->end()

                    ->floatNode('spacer_3')
                        ->info("Specifies the multiplier of spacer-3")
                        ->min(0)
                        ->defaultValue(1)
                    ->end()

                    ->floatNode('spacer_4')
                        ->info("Specifies the multiplier of spacer-4")
                        ->min(0)
                        ->defaultValue(1.5)
                    ->end()

                    ->floatNode('spacer_5')
                        ->info("Specifies the multiplier of spacer-5")
                        ->min(0)
                        ->defaultValue(2)
                    ->end()

                    ->floatNode('spacer_6')
                        ->info("Specifies the multiplier of spacer-6")
                        ->min(0)
                        ->defaultValue(3)
                    ->end()

                ->end()
            ->end()

            /**
             * Themes
             */
            ->scalarNode('default_theme')
                ->info("Specifies the name of the default theme")
                ->defaultValue('light')
            ->end()

            /**
             * Transition
             */
            ->arrayNode('transitions')
                ->addDefaultsIfNotSet()->children()

                    ->floatNode('base')
                        ->info("Specifies the base speed of the transition")
                        ->min(0)
                        ->defaultValue(1)
                    ->end()

                    ->floatNode('slow')
                        ->info("Specifies the multiplier of the \"slow\" transition")
                        ->min(0)
                        ->defaultValue(0.8)
                    ->end()

                    ->floatNode('normal')
                        ->info("Specifies the multiplier of the \"normal\" transition")
                        ->min(0)
                        ->defaultValue(0.3)
                    ->end()

                    ->floatNode('fast')
                        ->info("Specifies the multiplier of the \"fast\" transition")
                        ->min(0)
                        ->defaultValue(0.1)
                    ->end()

                ->end()
            ->end()

            /**
             * Typography
             */

            /**
             * Z-Index
             */

        ->end()->end()

        ->arrayNode('component')->addDefaultsIfNotSet()->children()

            ->arrayNode('brand')
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
    
                ->scalarNode('logo')
                    ->info("Specifies the logo of the company")
                    ->defaultNull()
                ->end()
    
                ->scalarNode('icon')
                    ->info("Specifies the icon (responsive logo) of the company")
                    ->defaultNull()
                ->end()
    
            ->end()->end()

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

        ->end()->end()

    ->end();
    
    $definition->rootNode()->validate()->always(function ($config) {

        //  Defaults Breakpoints
        // --

        // $breakpoints = [
        //     'phone'  => 576,
        //     'tablet'  => 768,
        //     'laptop'  => 992,
        //     'desktop' => 1200,
        //     'wide'    => 1400,
        //     'ultra'   => 1600
        // ];

        // foreach ($breakpoints as $name => $value) 
        // {
        //     if (!isset($config['layout']['breakpoints'][$value])) {
        //         // dump([$name, $value]);
        //         $config['layout']['breakpoints'][$name] = [
        //             'name'  => $name,
        //             'value' => $value
        //         ];
        //     }
        // }


        // dump($config['layout']['breakpoints']);
        
        return $config;

    })->end();
};