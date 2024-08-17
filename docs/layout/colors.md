# Colors

- [What is it about ?](#what-is-it-about-)
- [Defaults definitions](#defaults-definitions)
    - [Black, White & Gray scales](#black-white--gray-scales)
    - [Colors](#colors)
- [Add custom colors](#add-custom-colors)
- [Exclude useless colors](#exclude-useless-colors)

## What is it about ? 

Is a set of defaults colors.

## Defaults definitions

### Black, White & Gray scales

| Name | Variable | Value |
|-|-|-|
| black | $black | #111111 |
| white | $white | #ffFFFf |
| gray-100 | $gray-100 | #f8f9fa |
| gray-200 | $gray-200 | #e9ecef |
| gray-300 | $gray-300 | #dee2e6 |
| gray-400 | $gray-400 | #ced4da |
| gray-500 | $gray-500 | #adb5bd |
| gray-600 | $gray-600 | #6c757d |
| gray-700 | $gray-700 | #495057 |
| gray-800 | $gray-800 | #343a40 |
| gray-900 | $gray-900 | #212529 |

### Colors

| Name | Variable | Value |
|-|-|-|
| blue | $blue | #0d6efd |
| indigo | $indigo | #6610f2 |
| purple | $purple | #6f42c1 |
| pink | $pink | #d63384 |
| red | $red | #dc3545 |
| orange | $orange | #fd7e14 |
| yellow | $yellow | #ffc107 |
| green | $green | #198754 |
| teal | $teal | #20c997 |
| cyan | $cyan | #0dcaf0 |

## Customize colors

### From `SCSS` variables

> SCSS variables will always override the `ux.yaml` definition.

```scss
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
```

> These variables will generate the `:root` css
> 
> ```css
> :root {
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