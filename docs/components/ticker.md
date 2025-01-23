# Ticker



## What is it about ?

Create an horizontal text scroll.



## Integration

<!-- tabs:start -->
### **HTML**

```twig
<div class="ux-ticker" rel="js-ux-ticker" data-speed="15" data-delay="0" data-direction="rtl" data-loop="true" data-pauseHover="true">
    <div class="ux-ticker-item">My ticker <a href="#">message</a> 1</div>
    <div class="ux-ticker-item">My ticker message 2</div>
    <div class="ux-ticker-item">My ticker message 3</div>
</div>
``` 

### **Twig**

```twig
{% set messages = [
    "My ticker <a href=\"#\">message</a> 1",
    "My ticker message 2",
    "My ticker message 3",
] %}
<twig:Component:Ticker :items="messages" />
``` 

### **SCSS**

Import the builder `_example.scss`

```css 
@use './../../../vendor/osw3/symfony-ux/assets/sass/builders/ticker';
```

### **JavaScript**

Import the component `ExampleComponent`

```js
import './../../../vendor/osw3/symfony-ux/assets/scripts/components/TickerComponent';
```
<!-- tabs:end -->



## Configuration

<!-- tabs:start -->
### **YAML**

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `speed` | `integer` | Set the speed of scroll. 0 = No scroll | no | `15` |
| `delay` | `integer` | Set the delay before next message. | no | `0` |
| `direction` | `string` | Set the scroll direction. | no | `rtl` |
| `loop` | `bool` | Set whether the ticker will be played in loop. | no | `true` |
| `pause_hover` | `bool` | Set whether the ticker will be paused on mouseover. | no | `true` |

```yaml
symfony_ux:
    components:
        tickers:
            speed: 15
            delay: 0
            loop: true
            pause_hover: true
```

### **Twig**

### Twig configuration

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `items` | `array` | Set the list of messages. | yes |  |
| `speed` | `integer` | Set the speed of scroll. 0 = No scroll | no | `15` |
| `delay` | `integer` | Set the delay before next message. | no | `0` |
| `direction` | `string` | Set the scroll direction. | no | `rtl` |
| `loop` | `bool` | Set whether the ticker will be played in loop. | no | `true` |
| `pauseHover` | `bool` | Set whether the ticker will be paused on mouseover. | no | `true` |


> Note: Parameters with • override the YAML configuration.

```twig 
{% set messages = [ ... ] %}
<twig:Component:Ticker :items="messages" />
```
<!-- tabs:end -->




## Customize SCSS

<!-- tabs:start -->

### **Theme**

> There is no theme variable for this component.

### **Layout**

#### Custom file example

```css 
@use './../../../vendor/osw3/symfony-ux/assets/sass/storage/ticker';

@include ticker.setHeight(40px);
```

<hr>

#### Available mixins

##### `setHeight`

Sets the height of the ticker element.

```css 
@include ticker.setHeight( {Length} $height );
```
<!-- tabs:end -->
