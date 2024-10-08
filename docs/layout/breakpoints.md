# Breakpoints & Containers

Breakpoints are customizable widths that define how your responsive layout behaves across screen or viewport sizes.

## Defaults breakpoints and containers definitions

| Breakpoint names | Breakpoint values | Container values |
|-|-|-|
| phone | 576px | 540px |
| tablet | 768px | 720px |
| laptop | 992px | 960px |
| desktop | 1200px | 1140px |
| wide | 1400px | 1440px |
| ultra | 1600px | 1520px |

## Integration

Create your custom scss file  (like `app.scss`) and add:

```scss 
@import './<path-to-vendor>/osw3/symfony-ux/assets/sass/variables/breakpoints';
@import './<path-to-vendor>/osw3/symfony-ux/assets/sass/factories/containers';
```

## Customize names and values

### Method 1 : From the `symfony_ux.yaml`configuration file

```yaml 
ux:
    layout:
        breakpoints:
            base:
                phone:              # This is the reference name, it cannot be changed
                    name: phone     # The name to customize
                    breakpoint: 576 # The breakpoint value to customize
                    container: 540  # The container value to customize
                tablet:
                    name: tablet
                    breakpoint: 768
                    container: 720
                laptop:
                    name: laptop
                    breakpoint: 992
                    container: 960
                desktop:
                    name: desktop
                    breakpoint: 1200
                    container: 1140
                wide:
                    name: wide
                    breakpoint: 1200
                    container: 1140
                ultra:
                    name: ultra
                    breakpoint: 1600
                    container: 1520
```

> Don't forget to run the command `php bin/console ux:build` to apply changes.

### Method 2 : From `SCSS` variables

> SCSS variables will always override the `symfony_ux.yaml` definition.

Add your custom SASS variables before Symfony UX integration

```scss
// Customize Breakpoints & Containers names
$breakpoint-name-phone   : 'phone';
$breakpoint-name-tablet  : 'tablet';
$breakpoint-name-laptop  : 'laptop';
$breakpoint-name-desktop : 'desktop';
$breakpoint-name-wide    : 'wide';
$breakpoint-name-ultra   : 'ultra';

// Customize Breakpoints values
$breakpoint-phone        : '576px';
$breakpoint-tablet       : '768px';
$breakpoint-laptop       : '992px';
$breakpoint-desktop      : '1200px';
$breakpoint-wide         : '1400px';
$breakpoint-ultra        : '1600px';

// Customize Containers values
$container-phone         : '540px';
$container-tablet        : '720px';
$container-laptop        : '960px';
$container-desktop       : '1140px';
$container-wide          : '1440px';
$container-ultra         : '1520px';

// Import breakpoints variables
@import './<path-to-vendor>/osw3/symfony-ux/assets/sass/variables/breakpoints';
@import './<path-to-vendor>/osw3/symfony-ux/assets/sass/factories/containers';
```

## Add additional breakpoints and containers

### From the `symfony_ux.yaml`configuration file

Add your additional breakpoint and container in the `breakpoint->additional` section.

```yaml 
ux:
    layout:
        breakpoints:
            additional:
                big-screen:             # Add new breakpoint named 'extra'
                    breakpoint: 2000    # Set the breakpoint value
                    container: 1900     # Set the container value
```

> Don't forget to run the command `php bin/console ux:build` to apply changes.

### From `SCSS` variables

Add your additional breakpoints before the Symfony UX integration

```scss
// Your additional breakpoints & containers
$additional-breakpoints: (
    'extra': (
        breakpoint: 1800px, 
        container: 1740px
    )
);

// Import Symfony UX bundle
@import './<path-to-vendor>/osw3/symfony-ux/assets/sass/variables/breakpoints';
@import './<path-to-vendor>/osw3/symfony-ux/assets/sass/factories/containers';
```

> SCSS configuration will always override the yaml configuration.

## Exclude useless breakpoints and containers

you can remove the breakpoints definition you don't use in your project.  
Once adding the reference of a breakpoint added to the 'breakpoints->useless' definition, it will not be compiled into the final css.

### From the `symfony_ux.yaml`configuration file

```yaml
symfony_ux:
    layout:
        breakpoints:
            useless:
                - wide
                - ultra
```

### From `SCSS` variables

```scss 
$useless-breakpoints: ('wide', 'ultra');

@import './<path-to-vendor>/osw3/symfony-ux/assets/sass/variables/breakpoints';
@import './<path-to-vendor>/osw3/symfony-ux/assets/sass/factories/containers';
```