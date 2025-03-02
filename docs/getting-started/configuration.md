# Configuration

Symfony UX can be configured in three ways (Twig, SASS and YAML).

> **Important**  
> 1. Don't forget to run the command php bin/console ux:build after every change in `symfony_ux.yaml`.
> 2. SCSS and Twig configurations will override the YAML configuration.


## YAML configuration

### Configuration file

The configuration file is lacated at `config/packages/symfony_ux.yaml`.

> **Important**  
> Don't forget to run the command `php bin/console ux:build` after every change in the symfony_ux.yaml.

### YAML configuration exemple

Exemple for a layout section and a component:

```yaml
symfony_ux:
    layout:
        grid:
            division: 12
    components:
        copyright:
            company: "My Company"
            since: 2009
            symbol: "&copy;"
```

> Refer to the Layouts and Components documentation to learn how to structure the configuration file.

### Debugging Symfony UX Configuration

The following command displays the structure of the bundle configuration:
```shell 
bin/console config:dump-reference UXBundle
```

The following command shows the status of your configuration:
```shell 
bin/console debug:config UXBundle
```

## SCSS configuration

> **Important**  
> SCSS configuration will always override the YAML configuration.

Add your custom SASS settings before integrating Symfony UX.

### 1. Customize components styles

Create your own SASS configuration file, e.g., assets/sass/settings.scss:
```scss
/// Use the storage file
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storages/grid';
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storages/copyright';

/// Customize sass value by using mixin
@include grid.divisions(12);
@include copyright.setFontWeight(700);
```

### 2. Use your settings and component builder

In your main SASS file, import your SASS settings and component builders:
```scss
@use './settings.scss' as *;
@use '<vendor-path>/osw3/symfony-ux/assets/sass/builders/grid';
```

## Twig Configuration

> **Important**  
> Twig configuration will override both YAML and SCSS configurations.

Components can be customized directly in Twig templates, allowing for fine-tuned adjustments that take precedence over YAML definitions.

```twig
<twig:Component:Copyright company="Another Company" since="2015" />
```

This will override the YAML configuration for the `copyright` component, applying the new values only where this Twig statement is used.
