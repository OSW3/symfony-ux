# Menu

## What is it about ?

Create a menu.

<!-- {"file": "00-default.html", "language": "twig"} -->

## Twig integration

```twig 
{% set items = [
    {
        label : "Nav item 1",
        url   : "https://netlab.osw3.net"
    },
    {
        label : "Nav item 2",
        url   : "https://netlab.osw3.net"
    },
] %}
<twig:Menu :item="items" />
```

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `id` | `string` | Set the accordion `id` attribute. | no |  |
| `class` | `string` | Set custom classname. | no |  |
| `dataset` | `array` | Set list of `data` attributes; | no |  |
| `items` | `array` | Set list menu items; | no | [] |
| `orientation` | `string` | Set list menu items; | no | `horizontal` |
| `justify` | `string` | Set list menu items; | no | `start` |

### Item parameters

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `label` | `string` | Set the label of the link. | yes |  |
| `url` | `string` | Set the url of the link. | no |  |
| `active` | `bool` | If true the class `active` will be added to the link. | no | `false` |
| `disabled` | `bool` | If true, the link is disabled. | no | `false` |
| `target` | `string` | Set the name of the window target. | no | `_self` |

## SASS variables

### Layout variables

```scss
$menu--border-radius: 'small';
$menu--border-width: 1px;
$menu--link--text-decoration: none;
```

### Theme variables

#### Single theme or default theme values

If your application has only one theme, you can set the values ​​of it in the SCSS variables.
These variables will also be used to set default values ​​if your application has multiple themes.

```scss
$menu--background-color: #ffffff;
$menu--border-color: #adb5bd;
$submenu--background-color: #ffffff;
$menu-link--text-color: #0d6efd;
$menu-link--text-color--hover: #0d6efd;
$menu-link--text-color--active: #0d6efd;
$menu-link--text-color--disabled: #6c757d;
$menu-link--background-color: transparent;
$menu-link--background-color--hover: #e9ecef;
$menu-link--background-color--active: #dee2e6;
$menu-link--background-color--disabled: transparent;
```

#### Multiple themes

If your application has multiple themes, you need to set the component's theme properties in the theme property list.

Learn more about [creating a theme](./../layout/themes.md).

```scss
$properties: map-merge($properties, (
    menu--background-color: #ffffff,
    menu--border-color: #adb5bd,
    submenu--background-color: #ffffff,
    menu-link--text-color: #0d6efd,
    menu-link--text-color--hover: #0d6efd,
    menu-link--text-color--active: #0d6efd,
    menu-link--text-color--disabled: #6c757d,
    menu-link--background-color: transparent,
    menu-link--background-color--hover: #e9ecef,
    menu-link--background-color--active: #dee2e6,
    menu-link--background-color--disabled: transparent,
));
```