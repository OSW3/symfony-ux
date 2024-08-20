# Colors

## What is it about ? 

Is a set of defaults colors.

## Defaults definitions

### Colors

| Name | Variable | Value |
|-|-|-|
| blue | $blue | <span style="color: #0d6efd">#0d6efd</span> |
| indigo | $indigo | <span style="color: #6610f2">#6610f2</span> |
| purple | $purple | <span style="color: #6f42c1">#6f42c1</span> |
| pink | $pink | <span style="color: #d63384">#d63384</span> |
| red | $red | <span style="color: #dc3545">#dc3545</span> |
| orange | $orange | <span style="color: #fd7e14">#fd7e14</span> |
| yellow | $yellow | <span style="color: #ffc107">#ffc107</span> |
| green | $green | <span style="color: #198754">#198754</span> |
| teal | $teal | <span style="color: #20c997">#20c997</span> |
| cyan | $cyan | <span style="color: #0dcaf0">#0dcaf0</span> |

### Black, White & Gray scales

| Name | Variable | Value |
|-|-|-|
| black | $black | <span style="color: #111111">#111111</span> |
| white | $white | <span style="color: #ffFFFf">#ffFFFf</span> |
| gray-100 | $gray-100 | <span style="color: #f8f9fa">#f8f9fa</span> |
| gray-200 | $gray-200 | <span style="color: #e9ecef">#e9ecef</span> |
| gray-300 | $gray-300 | <span style="color: #dee2e6">#dee2e6</span> |
| gray-400 | $gray-400 | <span style="color: #ced4da">#ced4da</span> |
| gray-500 | $gray-500 | <span style="color: #adb5bd">#adb5bd</span> |
| gray-600 | $gray-600 | <span style="color: #6c757d">#6c757d</span> |
| gray-700 | $gray-700 | <span style="color: #495057">#495057</span> |
| gray-800 | $gray-800 | <span style="color: #343a40">#343a40</span> |
| gray-900 | $gray-900 | <span style="color: #212529">#212529</span> |

## Integration

When you add the bundle's `dist` file, the color variables will be automatically added and recognized in your SASS.

```scss
@import './<path-to-bundle>/assets/sass/dist';
```



## Customize colors

### From `SCSS` variables

> SCSS variables will always override the `ux.yaml` definition.

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

```

> These variables will generate the `:root` css
> 
> ```css
> :root {
>   --blue: #0d6efd;
>   --indigo: #6610f2;
>   --purple: #6f42c1;
>   --pink: #d63384;
>   --red: #dc3545;
>   --orange: #fd7e14;
>   --yellow: #ffc107;
>   --green: #198754;
>   --teal: #20c997;
>   --cyan: #0dcaf0;
>   --black: #111111;
>   --white: #ffFFFf;
>   --gray-100: #f8f9fa;
>   --gray-200: #e9ecef;
>   --gray-300: #dee2e6;
>   --gray-400: #ced4da;
>   --gray-500: #adb5bd;
>   --gray-600: #6c757d;
>   --gray-700: #495057;
>   --gray-800: #343a40;
>   --gray-900: #212529;
> }
> ```

## Add custom colors

1. Create a color variable

```scss
$pumpkin : #FF5E15;
```

2. Add the color to the `$additional-colors` list

```scss 

$additional-colors: (
    'pumpkin' : $pumpkin,
);
```

> Adding colors will generate the `:root` css
> 
> ```css
> :root {
>   /* ... */
>   --cyan: #0dcaf0;
>   --pumpkin: #FF5E15;
> }
> ```

## Exclude useless colors

Add the color's names into the `$useless-colors` list.

```scss 
$useless-colors: ('teal');
```

> Exclude colors will generate the `:root` css
> 
> ```css
> :root {
>   /* ... */
>   --green: #198754;
>   /* --teal: #20c997; */ <-- will be removed
>   --cyan: #0dcaf0;
>   --pumpkin: #FF5E15;
> }
> ```

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