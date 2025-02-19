# Offcanvas



## What is it about ?

Example component description.



## Integration

<!-- tabs:start -->
### **HTML**

```twig
``` 

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
| `noCloseButton` | `boolean` | Specifies whether to hide the close button within the offcanvas component. | no | `false` |
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
/>
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
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storage/example';

@include example.setPadding(1rem);
@include example.setTransitionType(ease-in-out);
```

<hr>

#### Available mixins

##### `xxxx`

xxxx

```css 
@xxxx;
```
<!-- tabs:end -->




## JavaScript events
