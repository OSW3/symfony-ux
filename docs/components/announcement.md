# Announcement

## What is it about ?

Create a announcement banner. Usually at the top of the website.
<br>

## Component configuration

```yaml
ux:
    components:
        announcement:
            animated: always
            animation: scroll
            speed: 500
```
<br>

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `animated` | `enum` | Set whether animation state. `always`, `none` | no | `always` |
| `animation` | `enum` | Set the animation type.  `ticker`,  `rotator`, `none` | no | `ticker` |
| `speed` | `integer` | Set the speed of the animation. | no | 6 |
<br>

## Twig integration

```twig

{% set messages = [
    "My Announcement <a href=\"#\">message</a> 1",
    "My Announcement message 2",
    "My Announcement message 3",
] %}
<twig:Announcement :messages="messages" />
``` 
<br>

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `id` | `string` | Set the accordion `id` attribute. | no |  |
| `class` | `string` | Set custom classname. | no |  |
| `dataset` | `array` | Set list of `data` attributes; | no |  |
| `messages` | `array` | List of messages | no | `[]` |
| `animated` | `enum` | Set whether animation state. `always`, `none` | no | `always` |
| `animation` | `enum` | Set the animation type.  `ticker`,  `rotator`, `none` | no | `ticker` |
| `speed` | `integer` | Set the speed of the animation. | no | 6 |
<br>

## SASS variables

### Layout variables

```scss
$announcement--height: 40px;
```
<br>

### Theme variables

#### Single theme or default theme values

If your application has only one theme, you can set the values ​​of it in the SCSS variables.
These variables will also be used to set default values ​​if your application has multiple themes.

```scss
$announcement--text-color: #ffffff;
$announcement--link-color: #ffffff;
$announcement--background-color: #6c757d;
```
<br>

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