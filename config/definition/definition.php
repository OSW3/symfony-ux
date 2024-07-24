<?php 

use OSW3\Breadcrumb\Enum\Template;

return static function($definition)
{
    $definition->rootNode()->children()

        /**
         * Home link settings
         * --
         * Specifies the the home link in the breadcrumb.
         */
        ->arrayNode('home')
            ->addDefaultsIfNotSet()
            ->children()

            /**
             * Home label
             * --
             * Specifies the label used for the home link in the breadcrumb.
             * 
             * e.g.: 
             * breadcrumb.home.label: Home
             * 
             * @path breadcrumb.home.label
             * @var string
             * @default null
             */
            ->scalarNode('label')
                ->info('Specifies the label used for the home link in the breadcrumb.')
                ->defaultValue("Home")
            ->end()

            /**
             * Home route
             * --
             * Specifies the route used for the home link in the breadcrumb.
             * 
             * e.g.: 
             * breadcrumb.home.route: app_homepage
             * 
             * @path breadcrumb.home.route
             * @var string
             * @default null
             */
            ->scalarNode('route')
                ->info('Specifies the route used for the home link in the breadcrumb.')
                ->defaultValue("app_homepage")
            ->end()

            /**
             * Home icon
             * --
             * Specifies the icon used for the home link in the breadcrumb.
             * 
             * e.g.: 
             * breadcrumb.home.icon: 'fas fa-home'
             * 
             * @path breadcrumb.home.icon
             * @var string
             * @default null
             */
            ->scalarNode('icon')
                ->info('Specifies the icon used for the home link in the breadcrumb.')
                ->defaultNull()
            ->end()

            /**
             * Home domain
             * --
             * Specifies the domain used for the home link in the breadcrumb.
             * 
             * e.g.: 
             * breadcrumb.home.domain: message
             * 
             * @path breadcrumb.home.domain
             * @var string
             * @default null
             */
            ->scalarNode('domain')
                ->info('Specifies the translation domain used for the home link in the breadcrumb.')
                ->defaultNull()
            ->end()

        ->end()->end()


        /**
         * Breadcrumb template
         * --
         * Add support class
         * e.g.: 
         * breadcrumb.template: bootstrap # <ol class="breadcrumb">
         * 
         * @path breadcrumb.template
         * @var enum
         * @values default, bootstrap
         * @default "default"
         */
        ->enumNode('template')
            ->info('Specifies the template used for breadcrumb.')
            ->values(Template::toArray())
            ->defaultValue(Template::DEFAULT->value)
        ->end()

        /**
         * Separator
         * --
         * Specifies the separator of the breadcrumb items.
         * 
         * e.g.: 
         * breadcrumb.separator: Home
         * 
         * @path breadcrumb.separator
         * @var string
         * @default null
         */
        ->scalarNode('separator')
            ->info('Specifies the separator of the breadcrumb items.')
            ->defaultNull()
        ->end()

        /**
         * Settings for breadcrumb items
         * --
         * 
         * @var array
         * @path breadcrumb.item
         */
        ->arrayNode('items')
            ->addDefaultsIfNotSet()
            ->children()

            /**
             * Add custom class attr to item
             * --
             * 
             * @var string
             * @default null
             */
            ->scalarNode('class')
                ->info('Specifies the class used for each breadcrumb items.')
                ->defaultNull()
            ->end()

            /**
             * Generate absolute link
             * --
             * 
             * @var boolean
             * @default false
             */
            ->booleanNode('absolute')->defaultFalse()->end()

        ->end()->end()


        ->booleanNode('hide_empty')->defaultTrue()->end()
            
        /**
         * Labels for breadcrumb items
         * --
         * 
         * e.g.: 
         * breadcrumb.labels:
         *      app_homepage: "Accueil"
         *      app_category: "Nom de categorie"
         * 
         * e.g. multilingual support: 
         * breadcrumb.labels:
         *      app_homepage: "homepage.breadcrumb.label"  # add "homepage.breadcrumb.label: Accueil" to the translation/message.fr.yaml
         *      app_category: "category.breadcrumb.label"  # add "category.breadcrumb.label: Nom de categorie" to the translation/message.fr.yaml
         * 
         * @path breadcrumb.labels
         * @var array
         * @syntax: route_name: custom value
         */
        // ->arrayNode('labels')->scalarPrototype()->end()

    ->end();
};