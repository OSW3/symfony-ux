# Links

## What is it about ?

A advanced link.

<!-- {"file": "00-default.html", "language": "twig"} -->

## Component configuration

```yaml
ux:
    components:
        links:
            target: _self
```

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `target` | `string` | Specifies the window target of links. | no | `_self` |

## Twig integration

```twig
<twig:Link label="My link" url="https://github.com/osw3/symfony-ux" target="_blank" />
``` 

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `id` | `string` | Set the accordion `id` attribute. | no |  |
| `class` | `string` | Set custom classname. | no |  |
| `dataset` | `array` | Set list of `data` attributes; | no |  |
| `label` | `string` | Set the label of the link. | yes |  |
| `url` | `string` | Set the destination of the link. | yes |  |
| `target` | `string` | Specifies the window target of links. | no | `_self` |
| `isDisabled` | `bool` | If true, the link is not clickable. | no | `false` |
| `noClassLink` | `bool` | If true, the base classname is removed. | no | `false` |

## SASS variables

### Layout variables

```scss
$link--text-decoration: underline !default;
$link--text-decoration--hover: none !default;
$link--text-decoration--active: none !default;
```

### Theme variables

#### Single theme or default theme values

If your application has only one theme, you can set the values ​​of it in the SCSS variables.
These variables will also be used to set default values ​​if your application has multiple themes.

```scss
$link--text-color: #0d6efd;
$link--text-color--hover: #0d6efd;
$link--text-color--active: #0d6efd;
$link--text-color--disabled: #6c757d;
```

#### Multiple themes

If your application has multiple themes, you need to set the component's theme properties in the theme property list.

Learn more about [creating a theme](./../layout/themes.md).

```scss
$properties: map-merge($properties, (
    link--text-color: #0d6efd,
    link--text-color--hover: #0d6efd,
    link--text-color--active: #0d6efd,
    link--text-color--disabled: #6c757d,
));
```