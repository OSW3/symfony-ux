# Prefix

## What is it ?

The prefix is used to identify the component of this Bundle.

```scss 
.ux-copyright {...}
.ux-link {...}
```

```html 
<div class="ux-copyright"> ... </div>
<a class="ux-link"> ... </a>
```  
<br>

## Default prefix

The default prefix is `ux`.
the prefix will be applied to components such as `ux-`.  
<br>

## How to change the prefix

### Method 1: by ux.yaml

```yaml 
ux:
    prefix: my-prefix
```

If your custom prefix is `my-prefix`.
the prefix will be applied to components such as `my-prefix-`.  
<br>

### Method 2: by SCSS variable

Add the `$prefix` variable in your SCSS file.

You must place this variable before importing the elements of the Bundle.

```scss 
$prefix: 'my-custom-prefix';
```

SCSS variable overrides ux.yaml configuration.  
<br>

## No prefix

Just set an empty string.

```yaml 
ux:
    prefix: ''
```

```scss 
$prefix: '';
```