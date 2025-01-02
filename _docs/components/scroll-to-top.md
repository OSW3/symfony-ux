# Scroll to top

## What is it about ?

Add a Scroll to top button.

<!-- Example -->
<!-- {"file": "00-default.html", "language": "twig"} -->
<!-- {"file": "01-skeleton.html", "language": "html", "render": false} -->

## Component configuration

```yaml
ux: 
    scroll_to_top: 
        top_at: 0
        toggle_at: 200
        symbol: "arrow-up"
        title: "Go to top"
```

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `top_at` | `integer` | Specifies the position of the top of the page. | no | `0` |
| `toggle_at` | `integer` | Specifies the position of the button's display or hiding point on the page. | no | `200` |
| `symbol` | `string` | Specifies the symbol of the button. | no | `arrow-up` |
| `title` | `string` | Specifies the title attribute value. | no | `Go to top` |

> Remember to execute `bin/console ux:build` to apply the configuration changes.

## Twig integration

```twig 
<twig:Ux:ScrollToTop />
```

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `id` | `string` | Set the accordion `id` attribute. | no |  |
| `class` | `string` | Set custom classname. | no |  |
| `dataset` | `array` | Set list of `data` attributes; | no |  |
| * `top_at` | `integer` | Specifies the position of the top of the page. | no | `0` |
| * `toggle_at` | `integer` | Specifies the position of the button's display or hiding point on the page. | no | `200` |
| * `symbol` | `string` | Specifies the symbol of the button. | no | `arrow-up` |
| * `title` | `string` | Specifies the title attribute value. | no | `Go to top` |

> Parameters marked with * override the configuration in the `config/package/symfony_ux.yaml` file.

## SASS variables

### Layout variables

```scss
// Configuration variables
$scroll-to-top--shape : 'square';
$scroll-to-top--position: 'bottom-right';
$scroll-to-top--transition : 'natural';

// Layout variables
$scroll-to-top--size: 40px;
$scroll-to-top--position-x: 1rem;
$scroll-to-top--position-y: 1rem;
$scroll-to-top--offset-x : 0px !default;
$scroll-to-top--offset-y : 0px !default;
$scroll-to-top--symbol: "\23F6";
$scroll-to-top--font-size: 2;
$scroll-to-top--z-index: 1040;

// Default colors
```

### Theme variables

#### Single theme or default theme values

If your application has only one theme, you can set the values ​​of it in the SCSS variables.
These variables will also be used to set default values ​​if your application has multiple themes.

```scss
$scroll-to-top--color: #ffffff;
$scroll-to-top--color--hover: #ffffff;
$scroll-to-top--bg-color: #20c997;
$scroll-to-top--bg-color--hover: #198754;
$scroll-to-top--border-color: #20c997;
$scroll-to-top--border-color--hover: #198754;
```

## Themes (CSS variables)

If your application has multiple themes, you need to set the component's theme properties in the theme property list.

Learn more about [creating a theme](./../layout/themes.md).

```scss
$properties: map.merge($properties, (
));
```

## Customize CSS

The `ux-` prefix in the example depends on your Symfony UX prefix.
```scss
.ux-scroll-to-top { ... }
```