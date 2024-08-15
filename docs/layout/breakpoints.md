# Breakpoints & Containers

- [What is it about ?](#what-is-it-about-)
- [Defaults definitions](#defaults-definitions)
- [Customize names and values](#customize-names-and-values)
    - [From the `ux.yaml`configuration file](#from-the-uxyamlconfiguration-file)
    - [From `SCSS` variables](#from-scss-variables)
- [Add additional breakpoints and containers](#add-additional-breakpoints-and-containers)
    - [From the `ux.yaml`configuration file](#from-the-uxyamlconfiguration-file-1)
    - [From `SCSS` variables](#from-scss-variables-1)
- [Exclude useless breakpoints and containers](#exclude-useless-breakpoints-and-containers)
    - [From the `ux.yaml`configuration file](#from-the-uxyamlconfiguration-file-2)
    - [From `SCSS` variables](#from-scss-variables-2)
- [SCSS integration example](#scss-integration-example)

## What is it about ? 

Breakpoints are the building blocks of responsive design.

## Defaults definitions

| Breakpoint names | Breakpoint values | Container values |
|-|-|-|
| phone | 576px | 540px |
| tablet | 768px | 720px |
| laptop | 992px | 960px |
| desktop | 1200px | 1140px |
| wide | 1400px | 1440px |
| ultra | 1600px | 1520px |

## Customize names and values

### From the `ux.yaml`configuration file

```yaml 
ux:
    layout:
        breakpoints:
            base:
                phone: # This is the base name
                    name: phone # The name to customize
                    breakpoint: 576 # The breakpoint value to customize
                    container: 540 # The container value to customize
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

### From `SCSS` variables

> SCSS variables will always override the `ux.yaml` definition.

```scss
$breakpoint-name-phone  : 'phone';
$breakpoint-name-tablet : 'tablet';
$breakpoint-name-laptop : 'laptop';
$breakpoint-name-desktop: 'desktop';
$breakpoint-name-wide   : 'wide';
$breakpoint-name-ultra  : 'ultra';

$breakpoint-phone  : '576px';
$breakpoint-tablet : '768px';
$breakpoint-laptop : '992px';
$breakpoint-desktop: '1200px';
$breakpoint-wide   : '1400px';
$breakpoint-ultra  : '1600px';

$container-phone  : '540px';
$container-tablet : '720px';
$container-laptop : '960px';
$container-desktop: '1140px';
$container-wide   : '1440px';
$container-ultra  : '1520px';
```

## Add additional breakpoints and containers

### From the `ux.yaml`configuration file

```yaml 
ux:
    layout:
        breakpoints:
            additional:
                extra: # Add new breakpoint named 'extra'
                    breakpoint: 1800 # Set the breakpoint value
                    container: 1740 # Set the container value
```

### From `SCSS` variables

```scss
$additional-breakpoints: (
    'extra': (
        breakpoint: 1800px, 
        container: 1740px
    )
);
```

## Exclude useless breakpoints and containers

### From the `ux.yaml`configuration file

```yaml
ux:
    layout:
        breakpoints:
            useless:
                - wide
                - ultra
```

### From `SCSS` variables

```scss 
$useless-breakpoints: ('wide', 'ultra');
```

## SCSS integration example

Create your custom scss file `app.scss`

```scss 
/// 1. Customize your variables
/// --

/// Customize breakpoints names
$breakpoint-name-phone  : 'phone';
// ...

/// Customize breakpoints values
$breakpoint-phone  : 576px;
// ...

/// Customize containers values
$container-phone  : 540px;
// ...

/// 2. Import  UX Components base
/// --

@import './<path-to-vendor>/osw3/symfony-ux/assets/sass/variables/breakpoints';
```