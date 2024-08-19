# Menu

## What is it about ?

Create a menu.
<br>

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
<br>

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `id` | `string` | Set the accordion `id` attribute. | no |  |
| `class` | `string` | Set custom classname. | no |  |
| `dataset` | `array` | Set list of `data` attributes; | no |  |
| `items` | `array` | Set list menu items; | no | [] |
| `orientation` | `string` | Set list menu items; | no | `horizontal` |
| `justify` | `string` | Set list menu items; | no | `start` |
<br>

### Item parameters

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `label` | `string` | xxx. | no |  |
| `url` | `string` | xxx. | no |  |
| `active` | `string` | xxx. | no |  |
| `disabled` | `string` | xxx. | no |  |
| `target` | `string` | xxx. | no |  |
