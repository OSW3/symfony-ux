# Colors

## What is it about ? 

Set the colors palette of themes.

## Defaults definitions

### Colors

| Name | Variable | Value | CSS Variable |
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

| Name | Variable | Value | CSS Variable |
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

When you add the bundle's `dist` file, the color variables will be automatically added and recognized in your SASS.

```scss
@import './<path-to-bundle>/assets/sass/dist';
```

Or add only the color definition files.

```scss
@import './<path-to-bundle>/assets/sass/variables/colors';
```

## Customize defaults colors

### From `YAML` configuration

*see variable names*

```yaml 
# config/packages/ux.yaml
ux:
    layout:
        colors:
            defaults:
                blue: '#018490'
                red: '#dc3545'
                # ...
```

### From `SCSS` variables

> SCSS variables will always override the `ux.yaml` definition.

Add your custom variables before the `dist` or `colors` SASS files *[see integration](#integration)*.


```scss
// main.scss
@import './my-custom-colors';
@import './<path-to-bundle>/assets/sass/dist';
```

Redefine default colors by simple name/value assignment.

*see variable names*

```scss
// my-custom-colors.scss
$blue: #0d6efd;
$red: #dc3545;
// ...

```

## Add custom colors

You can add additional colors.

> Additional colors from `yaml` and `scss` are merged.

### From `YAML` configuration

```yaml 
# config/packages/ux.yaml
ux:
    layout:
        colors:
            additional:
                pumpkin: '#FF5E15'
```

### From `SCSS` variables

1. Create a color variables
2. Add the color to the `$additional-colors` collection

```scss
// my-custom-colors.scss

// 1. color variables
$robin-egg-blue: #00cdcb;
$pink-flamingo: #ff38ff;

// 2. $additional-colors collection
$additional-colors: (
    'robin-egg-blue': $robin-egg-blue,
    'pink-flamingo': $pink-flamingo,
);
```

## Exclude useless colors

Useless colors are remove from CSS variables.

> Useless colors from `yaml` and `scss` are merged.

### From `YAML` configuration

```yaml 
# config/packages/ux.yaml
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
```

## Colors declination

### Shades collection

Add the color's names into the `$colors-shades` list and the levels of shade (percent has integer) in the sub-list;

```scss 
$colors-shades: (
    'pumpkin' : (10, 35),
);
```

> Exclude colors will generate the `:root` css
> 
> ```css
> :root {
>   /* ... */
>   --pumpkin--shade-10: #e65513;
>   --pumpkin--shade-35: #a63d0e;
> }
> ```

### Tints collection

Add the color's names into the `$colors-tints` list and the levels of tint (percent has integer) in the sub-list;

```scss 
$colors-tints: (
    'pumpkin' : (20, 30),
);
```

> Exclude colors will generate the `:root` css
>
> ```css
> :root {
>   /* ... */
>   --pumpkin--tint-20: #ff7e44;
>   --pumpkin--tint-30: #ff8e5b;
> }
> ```