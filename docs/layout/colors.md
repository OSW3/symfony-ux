# Colors

Defining color variables that you can use for UI elements and in your themes.  
SCSS color variables are used to generate CSS color variables.

## Defaults colors definitions

### Colors

| Name | SCSS Variable | Value | Generated CSS Variable |
|-|-|-|-|
| blue | $blue | #0d6efd | --blue: #0d6efd; |
| indigo | $indigo | #6610f2 | --indigo: #6610f2; |
| purple | $purple | #6f42c1 | --purple: #6f42c1; |
| pink | $pink | #d63384 | --pink: #d63384; |
| red | $red | #dc3545 | --red: #dc3545; |
| orange | $orange | #fd7e14 | --orange: #fd7e14; |
| yellow | $yellow | #ffc107 | --yellow: #ffc107; |
| green | $green | #198754 | --green: #198754; |
| teal | $teal | #20c997 | --teal: #20c997; |
| cyan | $cyan | #0dcaf0 | --cyan: #0dcaf0; |

### Black, White & Gray scales

| Name | SCSS Variable | Value | Generated CSS Variable |
|-|-|-|-|
| black | $black | #111111 | --black: #111111; |
| white | $white | #ffFFFf | --white: #ffFFFf; |
| gray-100 | $gray-100 | #f8f9fa | --gray-100: #f8f9fa; |
| gray-200 | $gray-200 | #e9ecef | --gray-200: #e9ecef; |
| gray-300 | $gray-300 | #dee2e6 | --gray-300: #dee2e6; |
| gray-400 | $gray-400 | #ced4da | --gray-400: #ced4da; |
| gray-500 | $gray-500 | #adb5bd | --gray-500: #adb5bd; |
| gray-600 | $gray-600 | #6c757d | --gray-600: #6c757d; |
| gray-700 | $gray-700 | #495057 | --gray-700: #495057; |
| gray-800 | $gray-800 | #343a40 | --gray-800: #343a40; |
| gray-900 | $gray-900 | #212529 | --gray-900: #212529; |

## Integration

```scss
@import '<path-to-your-vendor>/osw3/symfony-ux/assets/sass/variables/colors';
@import '<path-to-your-vendor>/osw3/symfony-ux/assets/sass/factories/colors';
```

## Customize defaults colors

### From `YAML` configuration

Change the values of colors.

```yaml 
# config/packages/symfony_ux.yaml
ux:
    layout:
        colors:
            defaults:
                blue           : "#0d6efd"
                indigo         : "#6610f2"
                purple         : "#6f42c1"
                pink           : "#d63384"
                red            : "#dc3545"
                orange         : "#fd7e14"
                yellow         : "#ffc107"
                green          : "#198754"
                teal           : "#20c997"
                cyan           : "#0dcaf0"
                black          : "#111111"
                white          : "#ffFFFf"
                gray-100 -100  : "#f8f9fa"
                gray-200 -200  : "#e9ecef"
                gray-300 -300  : "#dee2e6"
                gray-400 -400  : "#ced4da"
                gray-500 -500  : "#adb5bd"
                gray-600 -600  : "#6c757d"
                gray-700 -700  : "#495057"
                gray-800 -800  : "#343a40"
                gray-900 -900  : "#212529"
```

> Don't forget to run the command `php bin/console ux:build` to apply changes.

### From `SCSS` variables

> SCSS variables will always override the `symfony_ux.yaml` definition.

Add your custom variables before the `dist` or `colors` SASS files *[see integration](#integration)*.


```scss
$blue    : #0d6efd;
$indigo  : #6610f2;
$purple  : #6f42c1;
$pink    : #d63384;
$red     : #dc3545;
$orange  : #fd7e14;
$yellow  : #ffc107;
$green   : #198754;
$teal    : #20c997;
$cyan    : #0dcaf0;
$black   : #111111;
$white   : #ffFFFf;
$gray-100: #f8f9fa;
$gray-200: #e9ecef;
$gray-300: #dee2e6;
$gray-400: #ced4da;
$gray-500: #adb5bd;
$gray-600: #6c757d;
$gray-700: #495057;
$gray-800: #343a40;
$gray-900: #212529;

// Import colors variables
@import '<path-to-your-vendor>/osw3/symfony-ux/assets/sass/variables/colors';
```

## Add additional colors

You can add additional colors.

### From the `symfony_ux.yaml`configuration file

Add your additional colors in the `colors->additional` section.

```yaml 
# config/packages/symfony_ux.yaml
ux:
    layout:
        colors:
            additional:
                pumpkin: '#FF5E15'
```

> Don't forget to run the command `php bin/console ux:build` to apply changes.  

### From `SCSS` variables

Add your additional colors before the Symfony UX integration

1. Create a color variables
2. Add the color to the `$additional-colors` collection

```scss
// 1. color variables
$robin-egg-blue: #00cdcb;
$pink-flamingo: #ff38ff;

// 2. $additional-colors collection
$additional-colors: (
    'robin-egg-blue': $robin-egg-blue,
    'pink-flamingo': $pink-flamingo,
);

// Import Symfony UX bundle
@import '<path-to-your-vendor>/osw3/symfony-ux/assets/sass/variables/colors';
@import '<path-to-your-vendor>/osw3/symfony-ux/assets/sass/factories/colors';
```

> Additional colors from `yaml` and `scss` are merged.

## Exclude useless colors

you can remove the colors definition you don't use in your project.  
Once adding the reference of a breakpoint added to the 'colors->useless' definition, it will not be compiled into the final css.

> Useless colors from `yaml` and `scss` are merged.

### From `YAML` configuration

```yaml 
# config/packages/symfony_ux.yaml
ux:
    layout:
        colors:
            useless:
                - teal
                - pumpkin
```

### From `SCSS` variables

Add the color's names into the `$useless-colors` list.

```scss 
// my-custom-colors.scss
$useless-colors: (
    'teal',
    'pink-flamingo'
);

@import '<path-to-your-vendor>/osw3/symfony-ux/assets/sass/variables/colors';
@import '<path-to-your-vendor>/osw3/symfony-ux/assets/sass/factories/colors';
```

## Colors declination

Add **shades** and **tints** of colors.
Reference the color name to the shades or tints list and add percents of  shades or tints.

### From `YAML` configuration

```yaml 
# config/packages/symfony_ux.yaml
ux:
    layout:
        colors:
            shades:
                pumpkin: [20, 30]
                pink-flamingo: [20, 30]
            tints:
                pumpkin: [20, 30]
                pink-flamingo: [20, 30]
```

> Don't forget to run the command `php bin/console ux:build` to apply changes.  

### From `SCSS` variables

Add the color's names into the `$colors-shades` and/or `$colors-tints` list and the levels of shade (percent has integer) in the sub-list;

```scss 
// my-custom-colors.scss
$colors-shades: (
    'pumpkin' : (20, 30),
    'pink-flamingo' : (20, 30),
);
$colors-tints: (
    'pumpkin' : (20, 30),
    'pink-flamingo' : (20, 30),
);

@import '<path-to-your-vendor>/osw3/symfony-ux/assets/sass/variables/colors';
@import '<path-to-your-vendor>/osw3/symfony-ux/assets/sass/factories/colors';
```