# Tickers


## What is it about ?

Create an horizontal text scroll.

## Component configuration

```yaml
ux:
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
| `loop` | `bool` | Set whether the ticker will be played in loop. | no | `true` |
| `pause_hover` | `bool` | Set whether the ticker will be paused on mouseover. | no | `true` |

## Twig integration

```twig
{% set messages = [
    "My ticker <a href=\"#\">message</a> 1",
    "My ticker message 2",
    "My ticker message 3",
] %}
<twig:Ticker :items="[messages[0]]"/>
<twig:Ticker :items="messages" />
```

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `items` | `array` | Set the list of messages. | yes |  |
| `speed` | `integer` | Set the speed of scroll. 0 = No scroll | no | `15` |
| `delay` | `integer` | Set the delay before next message. | no | `0` |
| `loop` | `bool` | Set whether the ticker will be played in loop. | no | `true` |
| `pauseHover` | `bool` | Set whether the ticker will be paused on mouseover. | no | `true` |