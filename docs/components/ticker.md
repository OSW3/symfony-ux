# Ticker

## What is it about ?

Create an horizontal text scroll.

## Integration

<!-- tabs:start -->
### **Single message**

```twig
<twig:Component:Ticker items="My ticker message" />
``` 

### **Multiple messages**

```twig
{% set messages = [
    "My ticker <a href=\"#\">message</a> 1",
    "My ticker message 2",
    "My ticker message 3",
] %}
<twig:Component:Ticker :items="messages" />
``` 

### **Message with HTML**

```twig
{% set message = "My ticker <a href=\"#\">message</a>" %}
<twig:Component:Ticker :items="message" />
``` 

<!-- tabs:end -->


## Configuration

<!-- tabs:start -->
### **YAML**

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

### **Twig**

### Twig configuration

```twig 
{% set messages = [ ... ] %}
<twig:Component:Ticker :items="messages" />
```

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `items` | `array` | Set the list of messages. | yes |  |
| `speed` | `integer` | Set the speed of scroll. 0 = No scroll | no | `15` |
| `delay` | `integer` | Set the delay before next message. | no | `0` |
| `direction` | `string` | Set the scroll direction. | no | `rtl` |
| `loop` | `bool` | Set whether the ticker will be played in loop. | no | `true` |
| `pauseHover` | `bool` | Set whether the ticker will be paused on mouseover. | no | `true` |

### **SASS**

<!-- 

### Use the builder for button component

```scss 
@use './../../../vendor/osw3/symfony-ux/assets/sass/builders/brand';
```

### [optional] Customize the button component layout

- `setBreakpoints`  
Redefine available breakpoints name for the Brand Component
```scss 
@include brand.setBreakpoints((laptop, desktop));
``` -->


### **JavaScript**

### Import the component

```js
import './../../../vendor/osw3/symfony-ux/assets/scripts/components/TickerComponent';
```

<!-- tabs:end -->
