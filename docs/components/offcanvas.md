# Offcanvas



## What is it about ?

Example component description.



## Integration

<!-- tabs:start -->
### **Twig**

```twig
<twig:Component:Offcanvas />
``` 

### **SCSS**

```css 
@use '<vendor-path>/osw3/symfony-ux/assets/sass/builders/offcanvas';
```

### **JavaScript**

Import the component `ExampleComponent`

```js
import '<vendor-path>/osw3/symfony-ux/assets/scripts/components/OffcanvasComponent';
```
<!-- tabs:end -->



## Configuration

<!-- tabs:start -->
### **YAML**

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `placement` | `string` | Defines the position of the offcanvas component. Can be 'left' or 'right'. | no | `left` |
| `animation` | `string` | Determines the type of animation when displaying the component. Can be 'slide' or 'none'. | no | `slide` |
| `speed` | `string` | Controls the speed of the animation. Possible values are 'slow', 'normal', 'fast', or 'none'. | no | `normal` |
| `backdrop` | `boolean` | Indicates whether a blurred background should be displayed when the component is visible. | no | `true` |
| `is_showed` | `boolean` | Determines if the component is shown by default. | no | `false` |

```yaml
symfony_ux:
    components:
        offcanvas:
            placement: left # left,   right
            animation: slide # slide, none
            speed    : normal # 'slow','normal','fast','none'
            backdrop : true
            is_showed: false
```

### **Twig**

### Twig configuration

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `backdrop` | `boolean` | Indicates whether a backdrop should be displayed behind the offcanvas component. The backdrop can be clicked to close the offcanvas.	 | no | `true` |
| `id` | `string` | A unique identifier for the offcanvas component. | yes |  |
| `placement •` | `string` | Defines the position of the offcanvas component. Can be 'left' or 'right'. | no | `left` |
| `open •` | `boolean` | Determines if the component is shown. | no | `false` |
| `closeButton` | `boolean` | Specifies whether to hide the close button within the offcanvas component. | no | `true` |
| `header` | `string` | Specifies the HTML content for the offcanvas header. | no | `null` |
| `headerTemplate` | `string` | Specifies a template to use for rendering the offcanvas header. This takes priority over header. | no |  |
| `headerOptions` | `array` | An array of options passed to the header template for customization. | no | `[]` |
| `body` | `string` | Specifies the HTML content for the offcanvas body. | no | `null` |
| `bodyTemplate` | `string` | Specifies a template to use for rendering the offcanvas body. This takes priority over body. | no |  |
| `bodyOptions` | `array` | An array of options passed to the body template for customization. | no | `[]` |
| `footer` | `string` | Specifies the HTML content for the offcanvas footer. | no | `null` |
| `footerTemplate` | `string` | Specifies a template to use for rendering the offcanvas footer. This takes priority over footer. | no |  |
| `footerOptions` | `array` | An array of options passed to the footer template for customization. | no | `[]` |

> Note: Parameters with • override the YAML configuration.

```twig 
<twig:Component:Offcanvas
    id="my-offcanvas"
    header="..."
/>

<twig:Component:Button is="primary" label="Open Offcanvas" data-action="open" data-target="my-offcanvas" />
```
<!-- tabs:end -->




## Customize SCSS

<!-- tabs:start -->

### **Theme**

```css 
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storages/prefix';

$props: map.merge($props, (
    example--color              : var(--#{$prefix}black),
    example--color--hover       : var(--#{$prefix}orange),
    example--bg-color           : var(--#{$prefix}yellow),
    example--bg-color--hover    : var(--#{$prefix}green),
    example--border-color       : var(--#{$prefix}gray-600),
    example--border-color--hover: var(--#{$prefix}gray-700),
));
```

### **Layout**

#### Custom file example

```css 
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storage/offcanvas';

@include offcanvas.setBackdropBlur(4px);
@include offcanvas.setBackdropOpacity(0.5);
@include offcanvas.setOffcanvasWidth(280px);
@include offcanvas.setOffcanvasLeftWidth(null);
@include offcanvas.setOffcanvasRightWidth(null);
@include offcanvas.setPaddingX(spaces.$base * .94);
@include offcanvas.setPaddingY(spaces.$base * 1.25);
@include offcanvas.setSeparatorWidth(1px);
@include offcanvas.setTransitionDelay(var(--#{$prefix}transition-normal));
@include offcanvas.setTransitionType(ease-in-out);
```

<hr>

#### `setBackdropBlur`

Set the amount of blur applied to the backdrop.

```css
@include offcanvas.setBackdropBlur({Length} $length);
```

#### `setBackdropOpacity`

Set the opacity level of the backdrop.

```css
@include offcanvas.setBackdropOpacity({Number} $opacity);
```

#### `setOffcanvasWidth`

Set the default width of the offcanvas component.

```css
@include offcanvas.setOffcanvasWidth({Length} $width);
```

#### `setOffcanvasLeftWidth`

Set the custom width for the offcanvas when positioned on the left.

```css
@include offcanvas.setOffcanvasLeftWidth({Length | Null} $width);
```

#### `setOffcanvasRightWidth`

Set the custom width for the offcanvas when positioned on the right.

```css
@include offcanvas.setOffcanvasRightWidth({Length | Null} $width);
```

#### `setPaddingX`

Set the horizontal padding for the element.

```css
@include offcanvas.setPaddingX({Length} $padding);
```

#### `setPaddingY`

Set the vertical padding for the element.

```css
@include offcanvas.setPaddingY({Length} $padding);
```

#### `setSeparatorWidth`

Set the width of the separator of the section.

```css
@include offcanvas.setSeparatorWidth({Length} $width);
```

#### `setTransitionDelay`

Set the delay for the transition effect.

```css
@include offcanvas.setTransitionDelay({Time} $delay);
```

#### `setTransitionType`

Set the type of transition timing function.

```css
@include offcanvas.setTransitionType({String} $type);
```

<!-- tabs:end -->
