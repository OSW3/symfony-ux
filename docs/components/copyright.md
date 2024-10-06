# Copyright# Alerts

## What is it about ?

Display a copyright, generally on the website footer.

<!-- Example -->
<!-- {"file": "00-default.html", "language": "twig"} -->
<!-- {"file": "01-skeleton.html", "language": "html", "render": false} -->

## Component configuration

Set the configuration in the `config/package/ux.yaml`.

```yaml
ux: 
    copyright: 
        company: "My Company"
        since: 2009
        symbol: "&copy;"
        dates_separator: "-"
        separator: " • "
```

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `company` | `string` | Set the name of the company. | no |  |
| `since` | `string` | Set the year since the company has been active. | no | current year  |
| `symbol` | `string` | Set the copyright symbol to use. | no | \&copy; |
| `dates_separator` | `string` | Set the separator to use between dates in the display. | no | - |
| `separator` | `string` | Set the separator to use between elements in the display. | no | • |

> Remember to execute `bin/console ux:build` to apply the configuration changes.

## Twig integration

```twig 
<twig:Copyright />
```

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `id` | `string` | Set the accordion `id` attribute. | no |  |
| `class` | `string` | Set custom classname. | no |  |
| `dataset` | `array` | Set list of `data` attributes; | no |  |
| * `company` | `string` | Set the name of the company. | no |  |
| * `since` | `string` | Set the year since the company has been active. | no | current year  |
| * `symbol` | `string` | Set the copyright symbol to use. | no | \&copy; |
| * `dates_separator` | `string` | Set the separator to use between dates in the display. | no | - |
| * `separator` | `string` | Set the separator to use between elements in the display. | no | • |

Parameters marked with * override the configuration in the `config/package/ux.yaml` file.

## SASS variables

### Layout variables

```scss
// Layout variables
$copyright--font-size: .8rem;
$copyright--transition: 'normal';

// Default colors
$copyright--color: #6c757d;
$copyright--color--hover: #6c757d;
```

## Themes (CSS variables)

If your application has multiple themes, you need to set the component's theme properties in the theme property list.

Learn more about [creating a theme](./../layout/themes.md).

```scss
$properties: map-merge($properties, (
    copyright--color: #6c757d,
    copyright--color--hover: #6c757d,
));
```

## Customize CSS

The `ux-` prefix in the example depends on your Symfony UX prefix.
```scss
.ux-copyright { ... }
```