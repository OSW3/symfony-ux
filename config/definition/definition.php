<?php

use OSW3\UX\Enum\Announcement\Animation\Strategy as AnimationStrategy;
use OSW3\UX\Enum\Announcement\Animation\Type as AnimationType;
use OSW3\UX\Enum\PlacementX;
use OSW3\UX\Enum\SearchBox\Type;
use OSW3\UX\Enum\Size;

return static function($definition)
{
    $definition->rootNode()->children()

        /**
         * Prefix
         */
        ->scalarNode('prefix')
            ->info("Specifies the prefix")
            ->defaultValue('ux')
        ->end()

        ->booleanNode('var_default')
            ->info("Specifies wether the CSS var function is printed with default value")
            ->defaultTrue()
        ->end()

        ->arrayNode('layout')->addDefaultsIfNotSet()->children()

            /**
             * Breakpoints
             */
            ->arrayNode('breakpoints')->addDefaultsIfNotSet()->children()

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

            ->end()->end()


            /**
             * Colors
             */

            ->arrayNode('colors')->addDefaultsIfNotSet()->children()

                ->arrayNode('defaults')->addDefaultsIfNotSet()->children()

                    ->scalarNode('blue')->defaultValue('#0d6efd')->end()
                    ->scalarNode('indigo')->defaultValue('#6610f2')->end()
                    ->scalarNode('purple')->defaultValue('#6f42c1')->end()
                    ->scalarNode('pink')->defaultValue('#d63384')->end()
                    ->scalarNode('red')->defaultValue('#dc3545')->end()
                    ->scalarNode('orange')->defaultValue('#fd7e14')->end()
                    ->scalarNode('yellow')->defaultValue('#ffc107')->end()
                    ->scalarNode('green')->defaultValue('#198754')->end()
                    ->scalarNode('teal')->defaultValue('#20c997')->end()
                    ->scalarNode('cyan')->defaultValue('#0dcaf0')->end()

                    ->scalarNode('black')->defaultValue('#111111')->end()
                    ->scalarNode('white')->defaultValue('#ffffff')->end()
                    ->scalarNode('gray-100')->defaultValue('#f8f9fa')->end()
                    ->scalarNode('gray-200')->defaultValue('#e9ecef')->end()
                    ->scalarNode('gray-300')->defaultValue('#dee2e6')->end()
                    ->scalarNode('gray-400')->defaultValue('#ced4da')->end()
                    ->scalarNode('gray-500')->defaultValue('#adb5bd')->end()
                    ->scalarNode('gray-600')->defaultValue('#6c757d')->end()
                    ->scalarNode('gray-700')->defaultValue('#495057')->end()
                    ->scalarNode('gray-800')->defaultValue('#343a40')->end()
                    ->scalarNode('gray-900')->defaultValue('#212529')->end()

                ->end()->end()

                ->arrayNode('additional')
                    ->useAttributeAsKey('name')
                    ->scalarPrototype()->end()
                ->end()

                ->arrayNode('shades')
                    ->useAttributeAsKey('name')
                    ->arrayPrototype()
                        ->prototype('integer')
                            ->validate()
                                ->ifTrue(function($v) { return $v < 0 || $v > 100; })
                                ->thenInvalid('Shades values must be between 0 and 100')
                            ->end()
                        ->end()
                    ->end()
                ->end()

                ->arrayNode('tints')
                    ->useAttributeAsKey('name')
                    ->arrayPrototype()
                        ->prototype('integer')
                            ->validate()
                                ->ifTrue(function($v) { return $v < 0 || $v > 100; })
                                ->thenInvalid('Shades values must be between 0 and 100')
                            ->end()
                        ->end()
                    ->end()
                ->end()

                ->arrayNode('useless')
                    ->scalarPrototype()->end()
                ->end()

            ->end()->end()

            ->arrayNode('ui_colors')->addDefaultsIfNotSet()->children()

                ->arrayNode('defaults')->addDefaultsIfNotSet()->children()

                    ->scalarNode('success')
                        ->defaultValue('success')
                    ->end()
                    ->scalarNode('danger')
                        ->defaultValue('danger')
                    ->end()
                    ->scalarNode('warning')
                        ->defaultValue('warning')
                    ->end()
                    ->scalarNode('info')
                        ->defaultValue('info')
                    ->end()
                    ->scalarNode('primary')
                        ->defaultValue('primary')
                    ->end()
                    ->scalarNode('secondary')
                        ->defaultValue('secondary')
                    ->end()
                    ->scalarNode('light')
                        ->defaultValue('light')
                    ->end()
                    ->scalarNode('dark')
                        ->defaultValue('dark')
                    ->end()
                    ->scalarNode('muted')
                        ->defaultValue('muted')
                    ->end()

                ->end()->end()

                ->arrayNode('additional')
                    ->useAttributeAsKey('name')
                    ->scalarPrototype()->end()
                ->end()

                ->arrayNode('useless')
                    ->scalarPrototype()->end()
                ->end()

            ->end()->end()


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

        ->arrayNode('components')->addDefaultsIfNotSet()->children()

            // Accordions
            // -- 
            ->arrayNode('accordions')
                ->info("Parameters settings of Accordions component.")
                ->addDefaultsIfNotSet()->children()
    
                ->booleanNode('multiple')
                    ->info("Set whether Accordions can open multiple items in same time.")
                    ->defaultFalse()
                ->end()
    
                ->arrayNode('header')
                    ->addDefaultsIfNotSet()->children()

                    ->scalarNode('tag')
                        ->info("Set the tag type of items header.")
                        ->defaultValue('h2')
                    ->end()

                ->end()->end()
    
                ->arrayNode('content')
                    ->addDefaultsIfNotSet()->children()

                    ->scalarNode('max_height')
                        ->info("Set the max height of items content.")
                        ->defaultNull()
                        ->validate()
                            ->ifTrue(fn($v) => !is_null($v) && (!is_int($v) || $v < 0))
                            ->thenInvalid('The max_height must be a positive integer or null.')
                        ->end()
                    
                    ->end()

                ->end()->end()

            ->end()->end()

            // Alerts
            // -- 
            ->arrayNode('alerts')
                ->info("Parameters settings of Alerts component.")
                ->addDefaultsIfNotSet()->children()
    
                ->booleanNode('dismissible')
                    ->info("Set whether Alerts can be dismissible by default.")
                    ->defaultTrue()
                ->end()
    
                ->integerNode('delay')
                    ->info("Set the delay (in second) before alerts are automatically dismiss.")
                    ->min(0)
                    ->defaultValue(0)
                ->end()

            ->end()->end()

            // Analytics
            // -- 
            ->arrayNode('analytics')
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
                
            ->end()->end()

            // Announcement
            // -- 
            ->arrayNode('announcement')
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

            ->end()->end()

            // Brand
            // -- 
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
    
                ->enumNode('size')
                    ->info("Specifies the name of the company")
                    ->values(Size::toArray())
                    ->defaultValue(Size::MEDIUM->value)
                ->end()
    
                ->arrayNode('logo')
                    ->useAttributeAsKey('name')
                    ->scalarPrototype() 
                ->end()->end()
    
                ->scalarNode('url')
                    ->info("Specifies the url of the brand link")
                    ->defaultNull()
                ->end()
    
                ->scalarNode('route')
                    ->info("Specifies the route of the brand link")
                    ->defaultNull()
                ->end()

            ->end()->end()

            // Copyright
            // -- 
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

            // Links
            // -- 
            ->arrayNode('links')
                ->info("Parameters settings of the Links component.")
                ->addDefaultsIfNotSet()->children()
    
                ->scalarNode('target')
                    ->info("Specifies the window target of links")
                    ->defaultValue('_self')
                ->end()
    
            ->end()->end()

            // Offcanvas
            // -- 
            ->arrayNode('offcanvas')
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
    
            ->end()->end()
    
            // Rotators
            // -- 
            ->arrayNode('rotators')
                ->info("Parameters settings of the Rotators component.")
                ->addDefaultsIfNotSet()->children()
    
                ->integerNode('delay')
                    ->info("Set the delay before next message")
                    ->min(0)
                    ->defaultValue(3000)
                ->end()
    
                ->booleanNode('loop')
                    ->info("Set whether the ticker will be played in loop")
                    ->defaultTrue()
                ->end()
    
                ->booleanNode('pause_hover')
                    ->info("Set whether the ticker will be paused on mouseover")
                    ->defaultTrue()
                ->end()
    
            ->end()->end()
    
            // Scroll to top
            // -- 
            ->arrayNode('scroll_to_top')
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
    
            ->end()->end()
    
            // Search
            // -- 
            ->arrayNode('search')
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
    
            ->end()->end()
    
    
            // Search Box
            // -- 
            ->arrayNode('search_box')
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

            ->end()->end()

            // Tickers
            // -- 
            ->arrayNode('tickers')
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