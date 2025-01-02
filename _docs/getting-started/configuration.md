# Configuration

Symfony UX can be configured in three ways.

- **1.** With the yaml configuration file.
- **2.** Directly in your scss.
- **3.** When calling Twig components.

## YAML configuration

> IMPORTANT  
> Don't forget to run the command `php bin/console ux:build` after every change in the symfony_ux.yaml

### Debug the Symfony UX configuration

The following command allows you to see the structure of the bundle configuration.

```shell 
bin/console config:dump-reference UXBundle
```

The following command allows you to see the status of your configuration.

```shell 
bin/console debug:config UXBundle
```

## SCSS configuration

> IMPORTANT  
> SCSS configuration will always override the yaml configuration.

Add your custom SASS variable before Symfony UX integration

##### 1. Custom the value of Symfony UX variables

```scss
$breakpoint-ultra  : 1580px;
```

##### 2. Integrate Symfony UX

```scss
@import '<path-to-your-vendor>/osw3/symfony-ux/dist/sass/symfony-ux-bundle';
```

## Twig configuration