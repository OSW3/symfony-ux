# Copyright# Alerts

## What is it about ?

Display a copyright, generally on the website footer.
<br>

## Component configuration

```yaml
ux: 
    copyright: 
        company: "My Company"
        since: 2009
        symbol: "&copy;"
        dates_separator: "-"
        separator: " • "
```
<br>

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `company` | `string` | Set the name of the company. | no |  |
| `since` | `string` | Set the year since the company has been active. | no | current year  |
| `symbol` | `string` | Set the copyright symbol to use. | no | \&copy; |
| `dates_separator` | `string` | Set the separator to use between dates in the display. | no | - |
| `separator` | `string` | Set the separator to use between elements in the display. | no | • |
<br>

## Twig integration

```twig 
<twig:Copyright />
```
<br>

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `id` | `string` | Set the accordion `id` attribute. | no |  |
| `class` | `string` | Set custom classname. | no |  |
| `dataset` | `array` | Set list of `data` attributes; | no |  |
| `company` | `string` | Set the name of the company. | no |  |
| `since` | `string` | Set the year since the company has been active. | no | current year  |
| `symbol` | `string` | Set the copyright symbol to use. | no | \&copy; |
| `dates_separator` | `string` | Set the separator to use between dates in the display. | no | - |
| `separator` | `string` | Set the separator to use between elements in the display. | no | • |
<br>


## SASS variables

### Layout variables

```scss
$copyright--font-size: .8rem;
```
<br>

### Theme variables

#### Single theme or default theme values

If your application has only one theme, you can set the values ​​of it in the SCSS variables.
These variables will also be used to set default values ​​if your application has multiple themes.

```scss
$copyright--text-color: #6c757d;
```
<br>

#### Multiple themes

If your application has multiple themes, you need to set the component's theme properties in the theme property list.

Learn more about [creating a theme](./../layout/themes.md).

```scss
$properties: map-merge($properties, (
    copyright--text-color: #6c757d,
));
```