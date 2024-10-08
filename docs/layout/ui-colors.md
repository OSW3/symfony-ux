# UI Colors

An extensive color system that themes certain components.

## Defaults UI Colors definitions

| Names | SASS Variable | Color |
|-|-|-|
| success | $green | #28a745 |
| danger | $red | #dc3545 |
| warning | $orange | #ffc107 |
| info | $cyan | #17a2b8 |
| primary | $blue | #007bff |
| secondary | $gray-600 | #6c757d |
| light | $white | #f8f9fa |
| dark | $black | #343a40 |
| muted | $gray-500 | #adb5bd |

## Integration

```scss
@import '<path-to-your-vendor>/osw3/symfony-ux/assets/sass/variables/palette';
@import '<path-to-your-vendor>/osw3/symfony-ux/assets/sass/factories/palette';
```

## Customize names and values

### Method 1 : From the `symfony_ux.yaml`configuration file

```yaml
symfony_ux:
    layout:
        ui_colors:
            defaults:
                success: success
                danger: danger
                warning: warning
                info: info
                primary: primary
                secondary: secondary
                light: light
                dark: dark
                muted: muted
```

example 
```yaml
symfony_ux:
    layout:
        ui_colors:
            defaults:
                danger: error
```

> Don't forget to run the command `php bin/console ux:build` to apply changes.

### Method 2 : From `SCSS` variables

Add your custom SASS variables before Symfony UX integration

```scss
$ui-color-name-success  : 'success';
$ui-color-name-danger   : 'danger';
$ui-color-name-warning  : 'warning';
$ui-color-name-info     : 'info';
$ui-color-name-primary  : 'primary';
$ui-color-name-secondary: 'secondary';
$ui-color-name-light    : 'light';
$ui-color-name-dark     : 'dark';
$ui-color-name-muted    : 'muted';

@import '<path-to-your-vendor>/osw3/symfony-ux/assets/sass/variables/palette';
@import '<path-to-your-vendor>/osw3/symfony-ux/assets/sass/factories/palette';
```

## Add additional UI Definition

### From the `symfony_ux.yaml`configuration file

Add your additional UI color in the `ui_colors->additional` section.

```yaml 
symfony_ux:
    layout:
        ui_colors:
            additional:
                highlight: "#00FF99"
```

> Don't forget to run the command `php bin/console ux:build` to apply changes.

### From `SCSS` variables

Add your additional breakpoints before the Symfony UX integration

```scss
// Your additional UI Color
$additional-ui-colors: (
    highlight : $pumpkin,
);

// Import Symfony UX bundle
@import '<path-to-your-vendor>/osw3/symfony-ux/assets/sass/variables/palette';
@import '<path-to-your-vendor>/osw3/symfony-ux/assets/sass/factories/palette';
```

## Exclude useless UI colors

you can remove the UI colors definition you don't use in your project.  
Once adding the reference of a breakpoint added to the 'ui_colors->useless' definition, it will not be compiled into the final css.

### From the `symfony_ux.yaml`configuration file

```yaml
symfony_ux:
    layout:
        ui_colors:
            useless:
                - light
                - dark
                - muted
```

### From `SCSS` variables

```scss 
$useless-ui-colors: ('light', 'dark', 'muted');

@import '<path-to-your-vendor>/osw3/symfony-ux/assets/sass/variables/palette';
@import '<path-to-your-vendor>/osw3/symfony-ux/assets/sass/factories/palette';
```