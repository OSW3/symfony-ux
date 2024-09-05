# Buttons

## What is it about ?

Create advanced buttons.

<!-- {"file": "00-default.html", "language": "twig"} -->

## Component configuration

*no configuration available in the ux.yaml*

## Twig integration

```twig
<twig:Button label="My button" />
<twig:Button:Reset label="My button" />
<twig:Button:Submit label="My button" />
<twig:Button:Link label="My button" url="https://example.com" />
``` 

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `id` | `string` | Set the accordion `id` attribute. | no |  |
| `class` | `string` | Set custom classname. | no |  |
| `dataset` | `array` | Set list of `data` attributes; | no |  |
| `type` | `string` | Set the type of the button. | no | `button` |
| `label` | `string` | Set the label of the button. | no |  |
| `disabled` | `bool` | If true, the button will disabled. | no | `false` |
| `url` | `string` | Set the url of the link button. Required if the type is `link`. | no |  |
| `target` | `string` | Set the target of the link. | no | `_self` |
| `is` | `string` | Set the palette  style. | no | `primary` |
| `outline` | `bool` | If true, apply the outline style of the palette. | no | `false` |
| `size` | `string` | Set the size of the button. | no | `medium` |
| `block` | `bool` | If true the button will displayed as a block. | no | `false` |

## `type` values

| Value | Description |
|-|-|
| `button` | Set a button type Button |
| `submit` | Set a button type Submit |
| `reset` | Set a button type Reset |
| `link` | Set a button as a link |
<!-- | `close` | Set a predefined button Close | -->
<!-- | `dropdown` | Set a predefined dropdown button | -->

## `target` values

| Value | Description |
|-|-|
| `_self` | Set a link with target _self |
| `_parent` | Set a link with target _parent |
| `_blank` | Set a link with target _blank |
| `custom` | Set a link with a custom target |

## `is` values

| Value | Description |
|-|-|
| `success` | Set the style `success` |
| `warning` | Set the style `warning` |
| `danger` | Set the style `danger` |
| `info` | Set the style `info` |
| `primary` | Set the style `primary` |
| `secondary` | Set the style `secondary` |
| `muted` | Set the style `muted` |
| `light` | Set the style `light` |
| `dark` | Set the style `dark` |
| `custom` | Set the style of the custom palette |

## `size` values

| Value | Description |
|-|-|
| `small` | Set the style `small` |
| `normal` | Set the style `normal` |
| `medium` | Set the style `medium` |
| `large` | Set the style `large` |

## JavaScript functions

<!-- {"file": "event.html", "language": "twig"} -->


```javascript
import ButtonComponent from './../../../bundle/assets/scripts/components/ButtonComponent';

const jsButton = document.querySelector('[rel="js-button"]');

if (jsButton) {
    let ButtonHandler = new ButtonComponent( jsButton );
        ButtonHandler.onClick = (event, element) => console.log(event.target.dataset.message);
        ButtonHandler.onBeforeClick = (event, element) => console.log("This is before click function");
        ButtonHandler.onAfterClick = (event, element) => console.log("This is after click function");
}
```
