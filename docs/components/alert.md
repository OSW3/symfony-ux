# Alert



## What is it about ?

Create an alert component



## Code example

<!-- tabs:start -->
### **YAML**

```yaml
# config/packages/symfony_ux.yaml
symfony_ux:
    components:
        alerts:
            dismissible: true
            delay: 500
            palette: true
            sizes: true
```

### **HTML**

#### Example 1

```html
<div class="ui-alert ui-alert-success">
    <span class="ui-alert-icon">✅</span>
    <p class="ui-alert-message">This is an alert message</p>
</div>
``` 

#### Example 2

```twig
<div class="{{ classname('alert alert-success') }}">
    <span class="{{ classname('alert-icon') }}">✅</span>
    <p class="{{ classname('alert-message') }}">This is an alert message</p>
</div>
``` 

### **Twig**

#### Example 1

```twig
<twig:Component:Alert:Success message="..." />
``` 

#### Example 2

```twig
<twig:Component:Alert is="success" message="..." />
``` 

### **SCSS**

#### Customize layout example

```css 
/* assets/sass/components/_alerts.scss */
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storage/alert';
@include alert.setBorderWidth(1px);
// ...
```

#### Customize theme example

```css 
/* assets/sass/themes/_light.scss */
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storages/themes';
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storages/prefix';
@include themes.add('light', (
    'alert--color': var(--#{$prefix}black),
    // ...
));
```

#### Import the component builder

```css 
/* assets/sass/ui.scss */
@use '<vendor-path>/osw3/symfony-ux/assets/sass/builders/alert';
```

### **JavaScript**

```js
import '<vendor-path>/osw3/symfony-ux/assets/scripts/components/AlertComponent';
```
<!-- tabs:end -->


## API

<!-- tabs:start -->
### **YAML**

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|:-|
| **`dismissible`** | `boolean` | no | true | Indicates whether the alert can be dismissed by the user. |
| **`delay`** | `integer` | no |  | Delay in seconds before alerts are automatically dismissed. |
| **`palette`** | `boolean` | no | true | Indicates to SASS whether the palette is enabled. |
| **`sizes`** | `boolean` | no | true | Indicates to SASS whether the sizes are available. |


### **Twig**
> Note: Parameters with • override the YAML configuration.

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|:-|
| **`delay•`** | `int,string,null` | no | `0` | Delay in seconds before alerts are automatically dismissed. | 
| **`dismissible•`** | `boolean` | no | `false` | Indicates whether the alert can be dismissed by the user. | 
| **`icon`** | `string,null` | no | `null` | Icon associated with the alert. | 
| **`is`** | `string` | no | `null` | Type of the alert (`success`,`warning`,`danger`,`info`,`primary`,`secondary`,`dark`,`light`,`muted`). | 
| **`message`** | `string` | yes |  | Message displayed in the alert. | 
| **`size`** | `string` | no | `normal` | Size of the alert (`small`, `normal`, `medium`, `large`). | 


### **SASS Layout**

#### `setBorderWidth`
Sets the width of the border around the element.

```css 
@include alert.setBorderWidth({Length} $width);
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `width` | `Length` | yes | xxx | xxx |
<hr>


#### `setBorderWidth`
Sets the width of the border around the element.

```css
@include setBorderWidth({Length} $width);
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `width` | `Length` | yes | xxx | xxx |
<hr>


#### `setBorderStyle`
Sets the style of the border around the element.

```css
@include setBorderStyle({String} $style);
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `style` | `String` | yes | xxx | xxx |
<hr>


#### `setBorderRadius`
Sets the radius of the border corners, using a CSS variable.

```css
@include setBorderRadius({Length} $radius);
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `radius` | `Length` | yes | xxx | xxx |
<hr>


#### `setPaddingX`
Sets the horizontal padding for the element.

```css
@include setPaddingX({Length} $normal, {Length} $small: null, {Length} $large: null);
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `height` | `Length` | yes | xxx | xxx |
<hr>


#### `setPaddingY`
Sets the vertical padding for the element.

```css
@include setPaddingY({Length} $normal, {Length} $small: null, {Length} $large: null);
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `normal` | `Length` | yes | xxx | xxx |
| `small` | `Length` | no | null | xxx |
| `large` | `Length` | no | null | xxx |
<hr>


#### `setFontFamily`
Sets the font family for the text.

```css
@include setFontFamily({String} $family);
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `family` | `String` | yes | xxx | xxx |
<hr>


#### `setFontSize`
Sets the base font size for the text.

```css
@include setFontSize({Length} $size);
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `size` | `Length` | yes | xxx | xxx |
<hr>


#### `setFontSizeSmall`
Sets the font size for small text.

```css
@include setFontSizeSmall({Length} $size);
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `size` | `Length` | yes | xxx | xxx |
<hr>


#### `setFontSizeLarge`
Sets the font size for large text.

```css
@include setFontSizeLarge({Length} $size);
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `size` | `Length` | yes | xxx | xxx |
<hr>


#### `setFontWeight`
Sets the base font weight for the text.

```css
@include setFontWeight({Number} $weight);
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `weight` | `Number` | yes | xxx | xxx |
<hr>


#### `setFontWeightSmall`
Sets the font weight for small text.

```css
@include setFontWeightSmall({Number} $weight);
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `weight` | `Number` | yes | xxx | xxx |
<hr>


#### `setFontWeightLarge`
Sets the font weight for large text.

```css
@include setFontWeightLarge({Number} $weight);
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `weight` | `Number` | yes | xxx | xxx |
<hr>


#### `setLineHeight`
Sets the base line height for the text.

```css
@include setLineHeight({Number} $height);
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `height` | `Number` | yes | xxx | xxx |
<hr>


#### `setLineHeightSmall`
Sets the line height for small text.

```css
@include setLineHeightSmall({Number} $height);
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `height` | `Number` | yes | xxx | xxx |
<hr>


#### `setLineHeightLarge`
Sets the line height for large text.

```css
@include setLineHeightLarge({Number} $height);
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `height` | `Number` | yes | xxx | xxx |
<hr>


#### `isPaletteEnabled`
Enables or disables the use of a color palette.

```css
@include isPaletteEnabled({Boolean} $enabled);
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `enabled` | `Boolean` | yes | xxx | xxx |
<hr>


#### `setBoxShadow`
Sets the box shadow effect for the element.

```css
@include setBoxShadow({String} $shadow);
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `shadow` | `String` | yes | xxx | xxx |
<hr>


#### `setTransitionDelay`
Sets the transition delay for the brand's elements.

```css
@include setTransitionDelay({Length} $delay);
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `delay` | `Length` | yes | xxx | xxx |
<hr>


#### `setTransitionType`
Sets the type of transition timing function.

```css
@include setTransitionType({String} $type);
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `type` | `String` | yes | xxx | xxx |


### **SASS Theme**

#### `alert--color`
Defines the text color of the alert. The default value is set to `var(--black)`, ensuring high readability.
<hr>

#### `alert--bg-color`
Specifies the background color of the alert. The default value is `var(--gray-300)`, providing a neutral and subtle contrast.
<hr>

#### `alert--border-color`
Sets the border color of the alert. The default value is `var(--black)`, ensuring clear visual separation from surrounding elements.

<!-- tabs:end -->
