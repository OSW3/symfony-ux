# Tickers

## What is it about ?

Create an horizontal text scroll.

<!-- {"file": "00-default.html", "language": "twig"} -->

## Component configuration

```yaml
symfony_ux:
    components:
        tickers:
            speed: 15
            delay: 0
            loop: true
            pause_hover: true
```

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `speed` | `integer` | Set the speed of scroll. 0 = No scroll | no | `15` |
| `delay` | `integer` | Set the delay before next message. | no | `0` |
| `direction` | `string` | Set the scroll direction. | no | `rtl` |
| `loop` | `bool` | Set whether the ticker will be played in loop. | no | `true` |
| `pause_hover` | `bool` | Set whether the ticker will be paused on mouseover. | no | `true` |

## Twig integration

```twig
{% set messages = [
    "My ticker <a href=\"#\">message</a> 1",
    "My ticker message 2",
    "My ticker message 3",
] %}
<twig:Ux:Ticker :items="[messages[0]]"/>
<twig:Ux:Ticker :items="messages" />
```

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `items` | `array` | Set the list of messages. | yes |  |
| `speed` | `integer` | Set the speed of scroll. 0 = No scroll | no | `15` |
| `delay` | `integer` | Set the delay before next message. | no | `0` |
| `direction` | `string` | Set the scroll direction. | no | `rtl` |
| `loop` | `bool` | Set whether the ticker will be played in loop. | no | `true` |
| `pauseHover` | `bool` | Set whether the ticker will be paused on mouseover. | no | `true` |