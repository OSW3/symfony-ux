# Prefix

- [What is it about ?](#what-is-it-about-)
- [Defaults definitions](#defaults-definitions)
- [Customize the prefix](#customize-the-prefix)
    - [From the `ux.yaml`configuration file](#from-the-uxyamlconfiguration-file)
    - [From `SCSS` variables](#from-scss-variables)
- [Remove the prefix](#remove-the-prefix)
    - [From the `ux.yaml`configuration file](#from-the-uxyamlconfiguration-file-1)
    - [From `SCSS` variables](#from-scss-variables-1)

## What is it about ? 

The prefix is used to identify the component of this Bundle.

<small>in `scss`</small>
```scss 
.ux-copyright {...}
.ux-link {...}
```

<small>in `html`</small>
```html 
<div class="ux-copyright"> ... </div>
<a class="ux-link"> ... </a>
```

## Defaults definitions

The default prefix is `ux`.
the prefix will be applied to components such as `ux-`.  

## Customize the prefix

### From the `ux.yaml`configuration file

```yaml 
ux:
    prefix: my-prefix
```

If your custom prefix is `my-prefix`.
the prefix will be applied to components such as `my-prefix-`.  

### From `SCSS` variables

> SCSS variables will always override the `ux.yaml` definition.

Add the `$prefix` variable in your SCSS.

```scss 
$prefix: 'my-custom-prefix';
```

## Remove the prefix

To remove the prefix, just set an empty string.

### From the `ux.yaml`configuration file

```yaml 
ux:
    prefix: ''
```

### From `SCSS` variables

```scss 
$prefix: '';
```