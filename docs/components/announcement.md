# Announcement

## What is it about ?

Create a announcement banner. Usually at the top of the website.

<!-- Example -->
<!-- {"file": "00-default.html", "language": "twig"} -->

<!-- {"file": "01-skeleton.html", "language": "html", "render": false} -->

## Component configuration

Set the configuration in the `config/package/ux.yaml`.

This configuration is applied by default by all Announcement components and can be overridden when integrating twig.

```yaml
ux:
    components:
        announcement:
            animated: always
            animation: ticker
            speed: 6
```

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `animated` | `enum` | Set whether animation state. `always`, `none` | no | `always` |
| `animation` | `enum` | Set the animation type.  [`ticker`](./ticker.md),  [`rotator`](./rotator.md), `none` | no | `ticker` |
| `speed` | `integer` | Set the speed of the animation. | no | 6 |

## Twig integration

```twig

{% set messages = [
    "Announcement simple message",
    "Announcement with a <a href=\"#\">message as link</a>",
    "Another Announcement message",
] %}
<twig:Announcement :messages="messages" />
``` 

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `id` | `string` | Set the accordion `id` attribute. | no |  |
| `class` | `string` | Set custom classname. | no |  |
| `dataset` | `array` | Set list of `data` attributes; | no |  |
| `messages` | `array` | List of messages | no | `[]` |
| * `animated` | `enum` | Set whether animation state. `always`, `none` | no | `always` |
| * `animation` | `enum` | Set the animation type.  `ticker`,  `rotator`, `none` | no | `ticker` |
| * `speed` | `integer` | Set the speed of the animation. | no | 6 |

Parameters marked with * override the configuration in the `config/package/ux.yaml` file.

## SASS variables

```scss
// Layout variables
$announcement--height: 40px;
$announcement--transition: 'normal';

// Default colors
$announcement--color: #ffffff;
$announcement--color--hover: #ffffff;
$announcement--bg-color: #6c757d;
$announcement--bg-color--hover: #6c757d;
```

## Themes (CSS variables)

If your application has multiple themes, you need to set the component's theme properties in the theme property list.

Learn more about [creating a theme](./../layout/themes.md).

```scss
$properties: map-merge($properties, (
    announcement--color: #ffffff,
    announcement--color--hover: #ffffff,
    announcement--bg-color: #6c757d,
    announcement--bg-color--hover: #6c757d,
));
```

## Customize CSS

The `ux-` prefix in the example depends on your Symfony UX prefix.
```scss
.ux-announcement { ... }
```