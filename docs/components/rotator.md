# Rotators


## What is it about ?

Create an horizontal text scroll.

## Component configuration

```yaml
ux:
    components:
        rotators:
            pause_hover: true
```

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `delay` | `integer` | Set the delay before next message. | no | `5000` |
| `loop` | `bool` | Set whether the rotator will be played in loop. | no | `true` |
| `pause_hover` | `bool` | Set whether the rotator will be paused on mouseover. | no | `true` |

## Twig integration

```twig
{% set messages = [
    "My rotator <a href=\"#\">message</a> 1",
    "My rotator message 2",
    "My rotator message 3",
] %}
<twig:Rotator :items="[messages[0]]"/>
<twig:Rotator :items="messages" />
```

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `items` | `array` | Set the list of messages. | yes |  |
| `delay` | `integer` | Set the delay before next message. | no | `5000` |
| `loop` | `bool` | Set whether the rotator will be played in loop. | no | `true` |
| `pauseHover` | `bool` | Set whether the rotator will be paused on mouseover. | no | `true` |