# Scroll to top

## What is it about ?

Add a Scroll to top button.

<!-- {"file": "00-default.html", "language": "twig"} -->


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

## Twig integration

```twig 
<twig:ScrollToTop />
```

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `id` | `string` | Set the accordion `id` attribute. | no |  |
| `class` | `string` | Set custom classname. | no |  |
| `dataset` | `array` | Set list of `data` attributes; | no |  |
| `top_at` | `integer` | Specifies the position of the top of the page. | no | `0` |
| `toggle_at` | `integer` | Specifies the position of the button's display or hiding point on the page. | no | `200` |
| `symbol` | `string` | Specifies the symbol of the button. | no | `arrow-up` |
| `title` | `string` | Specifies the title attribute value. | no | `Go to top` |

## SASS variables

### Layout variables

```scss
$scroll-to-top--shape : 'square';
$scroll-to-top--position: 'bottom-right';
$scroll-to-top--transition : 'natural';
$scroll-to-top--size: 40px;
$scroll-to-top--position-x: 1rem;
$scroll-to-top--position-y: 1rem;
$scroll-to-top--offset-x : 0px !default;
$scroll-to-top--offset-y : 0px !default;
$scroll-to-top--symbol: "\23F6";
$scroll-to-top--font-size: 2;
$scroll-to-top--z-index: 1040;
```

### Theme variables

#### Single theme or default theme values

If your application has only one theme, you can set the values ​​of it in the SCSS variables.
These variables will also be used to set default values ​​if your application has multiple themes.

```scss
$scroll-to-top--text-color: #ffffff;
$scroll-to-top--text-color--hover: #ffffff;
$scroll-to-top--background-color: #20c997;
$scroll-to-top--background-color--hover: #198754;
$scroll-to-top--border-color: #20c997;
$scroll-to-top--border-color--hover: #198754;
```

#### Multiple themes

If your application has multiple themes, you need to set the component's theme properties in the theme property list.

Learn more about [creating a theme](./../layout/themes.md).

```scss
$properties: map-merge($properties, (
    scroll-to-top--text-color: #ffffff,
    scroll-to-top--text-color--hover: #ffffff,
    scroll-to-top--background-color: #20c997,
    scroll-to-top--background-color--hover: #198754,
    scroll-to-top--border-color: #20c997,
    scroll-to-top--border-color--hover: #198754,
));
```