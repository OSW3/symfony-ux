# Fonts

## Defaults fonts definitions

### Fonts names

| Names | SCSS Variables | CSS Variables |
|-|-|-|
| primary | $font-name-primary | --font-primary |
| secondary | $font-name-secondary | --font-secondary |
| headings | $font-name-headings | --font-headings |
| code | $font-name-code | --font-code |

### Fonts values

```scss 
$_monospace: (
    'family': "SFMono-Regular, Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace"
);
$_open_sans: (
    'family': "'OpenSans', 'Cantarell', 'Helvetica', 'Arial', sans-serif"
);
$_headings: (
    'family': "var(--font-primary)"
);
$_code: (
    'family': "var(--font-secondary)"
);
```

### Default collection

```scss 
$fonts: (
    $font-name-primary  : $_open_sans,
    $font-name-secondary: $_monospace,
    $font-name-headings : $_headings,
    $font-name-code     : $_code,
);
```


## Integration

Create your custom scss file  (like `app.scss`) and add:

```scss 
@import './<path-to-vendor>/osw3/symfony-ux/assets/sass/variables/fonts';
@import './<path-to-vendor>/osw3/symfony-ux/assets/sass/factories/fonts';
```

## Customize names and values

### From `SCSS` variables

#### 1. Add font definition

You can define a new font by specifying its name and URL:

```scss 
$lato: (
    'family': "'Lato', sans-serif",
    'url': "https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap"
);
```

#### 2. Add additional font or override existing font

To add this new font to the existing collection, use the following syntax:

```scss 
$additional-fonts: (
    'lato': $lato,

    // override font (same result)
    '#{$font-name-headings}': $lato,
    'headings': $lato,
);
```

## Exclude useless fonts

you can remove the fonts definition you don't use in your project.  
Once adding the reference of a font added to the 'useless-fonts' definition, it will not be compiled into the final css.

### From `SCSS` variables

```scss 
$useless-fonts: ('headings');

@import './<path-to-vendor>/osw3/symfony-ux/assets/sass/variables/fonts';
@import './<path-to-vendor>/osw3/symfony-ux/assets/sass/factories/fonts';
```