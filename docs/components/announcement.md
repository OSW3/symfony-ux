# Announcement

## What is it about ?

Create a announcement banner. Usually at the top of the website.

<!-- {"file": "00-default.html", "language": "twig"} -->

## Component configuration

```yaml
ux:
    components:
        announcement:
            animated: always
            animation: ticker
            speed: 500
```

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `animated` | `enum` | Set whether animation state. `always`, `none` | no | `always` |
| `animation` | `enum` | Set the animation type.  `ticker`,  `rotator`, `none` | no | `ticker` |
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
| `animated` | `enum` | Set whether animation state. `always`, `none` | no | `always` |
| `animation` | `enum` | Set the animation type.  `ticker`,  `rotator`, `none` | no | `ticker` |
| `speed` | `integer` | Set the speed of the animation. | no | 6 |

## SASS variables

### Layout variables

```scss
$announcement--height: 40px;
```

### Theme variables

#### Single theme or default theme values

If your application has only one theme, you can set the values ​​of it in the SCSS variables.
These variables will also be used to set default values ​​if your application has multiple themes.

```scss
$announcement--text-color: #ffffff;
$announcement--link-color: #ffffff;
$announcement--background-color: #6c757d;
```

#### Multiple themes

If your application has multiple themes, you need to set the component's theme properties in the theme property list.

Learn more about [creating a theme](./../layout/themes.md).

```scss
$properties: map-merge($properties, (
    announcement--text-color: #ffffff,
    announcement--link-color: #ffffff,
    announcement--background-color: #6c757d,
));
```