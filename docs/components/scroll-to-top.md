# Scroll to top



## What is it about ?

Add a Scroll to top button.



## Integration

<!-- tabs:start -->
### **HTML**

```twig
<button class="ux-scroll-to-top" title="Got to top" rel="js-ux-scroll-to-top"></button>
``` 

### **Twig**

```twig
<twig:Component:ScrollToTop />
``` 

### **SCSS**

Import the builder `_scroll-to-top.scss`

```css 
@use '<vendor-path>/osw3/symfony-ux/assets/sass/builders/scroll-to-top';
```

### **JavaScript**

Import the component `ScrollToTopComponent`

```js
import '<vendor-path>/osw3/symfony-ux/assets/scripts/components/ScrollToTopComponent';
```
<!-- tabs:end -->



## Configuration

<!-- tabs:start -->
### **YAML**

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `top_at` | `integer` | Specifies the position of the top of the page. | no | `0` |
| `toggle_at` | `integer` | Specifies the position of the button's display or hiding point on the page. | no | `200` |
| `symbol` | `string` | Specifies the symbol of the button. | no | `arrow-up` |
| `title` | `string` | Specifies the title attribute value. | no | `Go to top` |

```yaml
symfony_ux:
    components:
        scroll_to_top: 
            top_at: 0
            toggle_at: 200
            symbol: "arrow-up"
            title: "Go to top"
```

### **Twig**

### Twig configuration

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `id` | `string` | Set the accordion `id` attribute. | no |  |
| `class` | `string` | Set custom classname. | no |  |
| `dataset` | `array` | Set list of `data` attributes; | no |  |
| `top_at` • | `integer` | Specifies the position of the top of the page. | no | `0` |
| `toggle_at` • | `integer` | Specifies the position of the button's display or hiding point on the page. | no | `200` |
| `symbol` • | `string` | Specifies the symbol of the button. | no | `arrow-up` |
| `title` • | `string` | Specifies the title attribute value. | no | `Go to top` |

> Note: Parameters with • override the YAML configuration.

```twig 
<twig:Component:ScrollToTop 
    property_1="value 1" 
    property_2="value 2"
/>
```
<!-- tabs:end -->




## Customize SCSS

<!-- tabs:start -->

### **Theme**

```css 
@use './../../../../../../bundle/assets/sass/storages/prefix';

$props: map.merge($props, (
    scroll-to-top-color             : var(--#{$prefix}red),
    scroll-to-top--color--hover       : var(--#{$prefix}pink),
    scroll-to-top--bg-color          : var(--#{$prefix}green),
    scroll-to-top--bg-color--hover    : var(--#{$prefix}yellow),
    scroll-to-top--border-color      : var(--#{$prefix}gray-600),
    scroll-to-top--border-color--hover: var(--#{$prefix}gray-700),
));
```

### **Layout**

#### Custom file example

```css 
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storage/example';

@include scroll-to-top.setCursor(pointer);
@include scroll-to-top.setShape(square);
@include scroll-to-top.setPosition(bottom-right);
@include scroll-to-top.setTransition(natural);
@include scroll-to-top.setTransitionDelay(var(--#{$prefix}transition-normal));
@include scroll-to-top.setTransitionType(ease-in-out);
@include scroll-to-top.setSymbol(arrow-up);
@include scroll-to-top.setZIndex(999999);
@include scroll-to-top.setSquareRadius(6px);
```

<hr>

#### Available mixins

##### `setCursor`

Sets the cursor style for the scroll-to-top button.

```css 
@include scroll-to-top.setCursor( {Cursor} $cursor );
```

##### `setShape`

Sets the shape of the scroll-to-top button.

```css 
@include scroll-to-top.setShape( {String} $shape );
```

##### `setPosition`

Sets the position of the scroll-to-top button on the screen.

```css 
@include scroll-to-top.setPosition( {String} $position );
```

##### `setTransition`

Sets the type of transition for the scroll-to-top button.

```css 
@include scroll-to-top.setTransition( {String} $transition );
```

##### `setTransitionDelay`

Sets the delay before the transition begins for the scroll-to-top button.

```css 
@include scroll-to-top.setTransitionDelay( {Length} $delay );
```

##### `setTransitionType`

Sets the transition type (easing function) for the scroll-to-top button.

```css 
@include scroll-to-top.setTransitionType( {String} $type );
```

##### `setSymbol`

Sets the symbol displayed inside the scroll-to-top button.

```css 
@include scroll-to-top.setSymbol( {String} $symbol );
```

##### `setZIndex`

Sets the z-index of the scroll-to-top button to control stacking order.

```css 
@include scroll-to-top.setZIndex( {Number} $zIndex );
```

##### `setSquareRadius`

Sets the border radius for a square-shaped scroll-to-top button.

```css 
@include scroll-to-top.setSquareRadius( {Length} $radius );
```
<!-- tabs:end -->

