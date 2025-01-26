<?php

return static function($definition)
{
    $definition->rootNode()->children()

        ->scalarNode('prefix')
            ->info("Specifies the prefix")
            ->defaultValue('ux')
        ->end()

        ->booleanNode('var_default')
            ->info("Specifies wether the CSS var function is printed with default value")
            ->defaultTrue()
        ->end()

        ->arrayNode('layout')->addDefaultsIfNotSet()->children()

            ->append( (include __DIR__."/layout/breakpoints.php")() )
            ->append( (include __DIR__."/layout/grid.php")() )
            ->append( (include __DIR__."/layout/colors.php")() )
            ->append( (include __DIR__."/layout/palette.php")() )
            ->append( (include __DIR__."/layout/spacers.php")() )
            ->append( (include __DIR__."/layout/theme.php")() )
            ->append( (include __DIR__."/layout/transitions.php")() )

        ->end()->end()

        ->arrayNode('components')->addDefaultsIfNotSet()->children()

            // ->append( (include __DIR__."/components/accordions.php")() )
            // ->append( (include __DIR__."/components/alerts.php")() )
            ->append( (include __DIR__."/components/analytics.php")() )
            // ->append( (include __DIR__."/components/announcement.php")() )
            ->append( (include __DIR__."/components/brand.php")() )
            ->append( (include __DIR__."/components/copyright.php")() )
            ->append( (include __DIR__."/components/links.php")() )
            // ->append( (include __DIR__."/components/offcanvas.php")() )
            // ->append( (include __DIR__."/components/rotators.php")() )
            ->append( (include __DIR__."/components/scrollToTop.php")() )
            // ->append( (include __DIR__."/components/search.php")() )
            // ->append( (include __DIR__."/components/search_box.php")() )
            ->append( (include __DIR__."/components/tickers.php")() )

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