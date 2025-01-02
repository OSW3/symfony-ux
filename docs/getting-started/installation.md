# How to install Symfony UX


## Install the Bundle

Open a command console, enter your project directory and execute the following command to download the latest stable version of this bundle

```console
composer require osw3/symfony-ux
```

## Prepare for update

Optional but recommend  
Edit the line `"osw3/symfony-ux"` on your `composer.json`

```json 
{
    "require": {
        "osw3/symfony-ux": "*",
    },
}
```

## Enable the Bundle

Then, enable the bundle by adding it to the list of registered bundles in the `config/bundles.php` file of your project:

```php 
// config/bundles.php

return [
    // ...
    OSW3\UX\UXBundle::class => ['all' => true],
];
```

## Enable Twig components

Make sure to make Twig components accessible to Symfony in the `config/packages/twig_component.yaml` file of your project:

```yaml
twig_component:
    defaults:
        OSW3\UX\Components\: '@SymfonyUx/'
```

## Dependencies

```shell
    composer require symfony/twig-bundle
    composer require symfony/options-resolver
    composer require symfony/ux-twig-component
    composer require symfony/webpack-encore-bundle
```