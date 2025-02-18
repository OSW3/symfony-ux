# Alert



## What is it about ?

Create an alert component



## Integration

<!-- tabs:start -->
### **HTML**

```twig
<div class="ui-alert ui-alert-success">
    <span class="ui-alert-icon">✅</span>
    <p class="ui-alert-message">This is an alert message</p>
</div>
``` 

### **Twig**

```twig
<twig:Component:Alert:Success message="..." />
<twig:Component:Alert:Warning message="..." />
<twig:Component:Alert:Danger message="..." />
<twig:Component:Alert:Info message="..." />
<twig:Component:Alert:Primary message="..." />
<twig:Component:Alert:Secondary message="..." />
<twig:Component:Alert:Dark message="..." />
<twig:Component:Alert:Light message="..." />
<twig:Component:Alert:Muted message="..." />
``` 

### **SCSS**

```css 
@use '<vendor-path>/osw3/symfony-ux/assets/sass/builders/alert';
```

### **JavaScript**

Import the component `ExampleComponent`

```js
import '<vendor-path>/osw3/symfony-ux/assets/scripts/components/AlertComponent';
```
<!-- tabs:end -->



## Configuration

<!-- tabs:start -->
### **YAML**

Set default configuration for all Alerts.

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `dismissible` | `boolean` | Indicates whether the alert can be dismissed by the user. | no | true |
| `delay` | `integer` | Delay in seconds before alerts are automatically dismissed. | no |  |

```yaml
symfony_ux:
    components:
        alerts:
            dismissible: true
            delay: 500
```

### **Twig**

### Twig configuration

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `delay` | `int,string,null` | Delay in seconds before alerts are automatically dismissed. | no | `0` |
| `dismissible` | `boolean` | Indicates whether the alert can be dismissed by the user. | no | `false` |
| `icon` | `string,null` | Icon associated with the alert. | no | `null` |
| `is` | `string` | Type of the alert (`success`,`warning`,`danger`,`info`,`primary`,`secondary`,`dark`,`light`,`muted`). | no | `null` |
| `message` | `string` | Message displayed in the alert. | yes |  |
| `size` | `string` | Size of the alert (`small`, `normal`, `medium`, `large`). | no | `normal` |

> Note: Parameters with • override the YAML configuration.

```twig 
<twig:Component:Alert:Success
    dismissible
    icon="✅"
    message="..." 
/>
```
<!-- tabs:end -->




## Customize SCSS

<!-- tabs:start -->

### **Theme**

```css 
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storages/prefix';

$props: map.merge($props, (
    'alert--color'       : var(--#{$prefix}black),
    'alert--bg-color'    : var(--#{$prefix}gray-300),
    'alert--border-color': var(--#{$prefix}black),
));
```

### **Layout**

#### Custom file example

```css 
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storage/alert';

@include alert.setBorderWidth(1px);
@include setBorderWidth(1px);
@include setBorderStyle('solid');
@include setBorderRadius(var(--border-radius-normal));
@include setPaddingX(10px, 5px, 15px);
@include setPaddingY(12px, 8px, 16px);
@include setFontFamily('Arial, sans-serif');
@include setFontSize(16px);
@include setFontSizeSmall(14px);
@include setFontSizeLarge(18px);
@include setFontWeight(400);
@include setFontWeightSmall(300);
@include setFontWeightLarge(500);
@include setLineHeight(1.5);
@include setLineHeightSmall(1.2);
@include setLineHeightLarge(1.8);
@include setEnablePalette(true);
@include setBoxShadow('0 1px 3px rgba(0, 0, 0, 0.1)');
@include setTransitionDelay(var(--transition-normal));
@include setTransitionType('ease-in-out');
```

<hr>

#### Available mixins

##### `setBorderWidth`

Sets the width of the border around the element.

```css 
@include alert.setBorderWidth({Length} $width);
```

##### `setBorderWidth`

Sets the width of the border around the element.

```css
@include setBorderWidth({Length} $width);
```

##### `setBorderStyle`

Sets the style of the border around the element.

```css
@include setBorderStyle({String} $style);
```

##### `setBorderRadius`

Sets the radius of the border corners, using a CSS variable.

```css
@include setBorderRadius({Length} $radius);
```

##### `setPaddingX`

Sets the horizontal padding for the element.

```css
@include setPaddingX({Length} $normal, {Length} $small: null, {Length} $large: null);
```

##### `setPaddingY`

Sets the vertical padding for the element.

```css
@include setPaddingY({Length} $normal, {Length} $small: null, {Length} $large: null);
```

##### `setFontFamily`

Sets the font family for the text.

```css
@include setFontFamily({String} $family);
```

##### `setFontSize`

Sets the base font size for the text.

```css
@include setFontSize({Length} $size);
```

##### `setFontSizeSmall`

Sets the font size for small text.

```css
@include setFontSizeSmall({Length} $size);
```

##### `setFontSizeLarge`

Sets the font size for large text.

```css
@include setFontSizeLarge({Length} $size);
```

##### `setFontWeight`

Sets the base font weight for the text.

```css
@include setFontWeight({Number} $weight);
```

##### `setFontWeightSmall`

Sets the font weight for small text.

```css
@include setFontWeightSmall({Number} $weight);
```

##### `setFontWeightLarge`

Sets the font weight for large text.

```css
@include setFontWeightLarge({Number} $weight);
```

##### `setLineHeight`

Sets the base line height for the text.

```css
@include setLineHeight({Number} $height);
```

##### `setLineHeightSmall`

Sets the line height for small text.

```css
@include setLineHeightSmall({Number} $height);
```

##### `setLineHeightLarge`

Sets the line height for large text.

```css
@include setLineHeightLarge({Number} $height);
```

##### `setEnablePalette`

Enables or disables the use of a color palette.

```css
@include setEnablePalette({Boolean} $enabled);
```

##### `setBoxShadow`

Sets the box shadow effect for the element.

```css
@include setBoxShadow({String} $shadow);
```

##### `setTransitionDelay`

Sets the transition delay for the brand's elements.

```css
@include setTransitionDelay({Length} $delay);
```

##### `setTransitionType`

Sets the type of transition timing function.

```css
@include setTransitionType({String} $type);
```

<!-- tabs:end -->
