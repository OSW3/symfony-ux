# Buttons



## What is it about ?

Create advanced buttons.



## Code example

<!-- tabs:start -->
### **HTML**

#### Example 1

```html
<button type="button" class="ui-button">My button</button>
<button type="submit" class="ui-button">My button</button>
<button type="reset" class="ui-button">My button</button>
<a href="#" class="ui-button">My button</a>
``` 

#### Example 2

```html
<button type="button" class="{{ classname('button') }}">My button</button>
<button type="submit" class="{{ classname('button') }}">My button</button>
<button type="reset" class="{{ classname('button') }}">My button</button>
<a href="#" class="{{ classname('button') }}">My button</a>
``` 


### **Twig**

#### Example 1

```twig
<twig:Component:Button label="My button" />
``` 

#### Example 2

```twig
<twig:Component:Button:Submit label="My button" />
``` 

#### Example 3

```twig 
<twig:Component:Button is="primary" label="primary" />
```

### **SCSS**

#### Customize layout example

```css 
/* assets/sass/components/button.scss */
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storage/button';
@include button.setBorderWidth(1px);
// ...
```

#### Customize theme example

```css 
/* assets/sass/themes/_light.scss */
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storages/themes';
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storages/prefix';
@include themes.add('light', (
    'button--color': var(--#{$prefix}black),
    // ...
));
```

#### Import the component builder

```css 
/* assets/sass/ui.scss */
@use '<vendor-path>/osw3/symfony-ux/assets/sass/builders/button';
```
<!-- tabs:end -->



## API

<!-- tabs:start -->
### **Twig**

#### Twig configuration

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|:-|
| **`id`** | `string` | no |  | Set the accordion `id` attribute. |
| **`class`** | `string` | no |  | Set custom classname. |
| **`dataset`** | `array` | no |  | Set list of `data` attributes; |
| **`type`** | `string` | no | `button` | Set the type of the button. |
| **`label`** | `string` | no |  | Set the label of the button. |
| **`disabled`** | `bool` | no | `false` | If true, the button will disabled. |
| **`url`** | `string` | if type `link` |  | Set the url of the link button. |
| **`target`** | `string` | no | `_self` | Set the target of the link. |
| **`is`** | `string` | no | `primary` | Set the palette  style. |
| **`outline`** | `bool` | no | `false` | If true, apply the outline style of the palette. |
| **`size`** | `string` | no | `medium` | Set the size of the button. |
| **`block`** | `bool` | no | `false` | If true the button will displayed as a block. |

<hr>

##### `type` values

| Value | Description |
|-|-|
| `button` | Set a button type Button |
| `submit` | Set a button type Submit |
| `reset` | Set a button type Reset |
| `link` | Set a button as a link |

##### `target` values

| Value | Description |
|-|-|
| `_self` | Set a link with target _self |
| `_parent` | Set a link with target _parent |
| `_blank` | Set a link with target _blank |
| `custom` | Set a link with a custom target |

##### `is` values

| Value | Description |
|-|-|
| `success` | Set the style `success` |
| `warning` | Set the style `warning` |
| `danger` | Set the style `danger` |
| `info` | Set the style `info` |
| `primary` | Set the style `primary` |
| `secondary` | Set the style `secondary` |
| `muted` | Set the style `muted` |
| `light` | Set the style `light` |
| `dark` | Set the style `dark` |
<!-- | `custom` | Set the style of the custom palette | -->

##### `size` values

| Value | Description |
|-|-|
| `small` | Set the style `small` |
| `normal` | Set the style `normal` |
| `medium` | Set the style `medium` |
| `large` | Set the style `large` |


### **SASS Layout**

#### `setBorderWidth`  
Sets the border width of the button.  

```scss
@include button.setBorderWidth( {Length} $width );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `width` | `Length` | yes | `1px` | Defines the width of the button's border. |
<hr>  

#### `setBorderRadius`  
Defines the border radius of the button, controlling its corner rounding.  

```scss
@include button.setBorderRadius( {Length} $radius );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `radius` | `Length` | yes | `var(--border-radius-normal)` | Specifies the roundness of the button's corners. |
<hr>  

#### `setCursor`  
Sets the cursor type when hovering over the button.  

```scss
@include button.setCursor( {String} $cursor );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `cursor` | `String` | yes | `pointer` | Defines the cursor style when hovering over the button. |
<hr>  

#### `setFontFamily`  
Specifies the font family used for the button text.  

```scss
@include button.setFontFamily( {String} $font-family );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `font-family` | `String` | yes | `inherit` | Defines the font family, inheriting from the parent element by default. |
<hr>  

#### `setFontSize`  
Sets the font size of the button for different screen sizes.  

```scss
@include button.setFontSize( {Length} $mobile, {Length} $tablet, {Length} $desktop );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `mobile`  | `Length` | yes | `fonts.$scale-base * 1` | Font size for mobile screens. |
| `tablet`  | `Length` | yes | `fonts.$scale-base * .8` | Font size for tablet screens. |
| `desktop` | `Length` | yes | `fonts.$scale-base * 1.6` | Font size for desktop screens. |
<hr>  

#### `setFontWeight`  
Defines the font weight of the button text for different screen sizes.  

```scss
@include button.setFontWeight( {Number} $mobile, {Number} $tablet, {Number} $desktop );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `mobile`  | `Number` | yes | `100 * 4` | Font weight for mobile screens. |
| `tablet`  | `Number` | yes | `100 * 4` | Font weight for tablet screens. |
| `desktop` | `Number` | yes | `100 * 7` | Font weight for desktop screens. |
<hr>  

#### `setLineHeight`  
Specifies the line height for button text across different screen sizes.  

```scss
@include button.setLineHeight( {Number} $mobile, {Number} $tablet, {Number} $desktop );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `mobile`  | `Number` | yes | `1.5` | Line height for mobile screens. |
| `tablet`  | `Number` | yes | `1` | Line height for tablet screens. |
| `desktop` | `Number` | yes | `1.8` | Line height for desktop screens. |
<hr>  

#### `setPaddingX`  
Defines the horizontal padding of the button for different screen sizes.  

```scss
@include button.setPaddingX( {Length} $mobile, {Length} $tablet, {Length} $desktop );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `mobile`  | `Length` | yes | `spaces.$base * .6` | Horizontal padding for mobile screens. |
| `tablet`  | `Length` | yes | `spaces.$base * .4` | Horizontal padding for tablet screens. |
| `desktop` | `Length` | yes | `spaces.$base * 1` | Horizontal padding for desktop screens. |
<hr>  

#### `setPaddingY`  
Defines the vertical padding of the button for different screen sizes.  

```scss
@include button.setPaddingY( {Length} $mobile, {Length} $tablet, {Length} $desktop );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `mobile`  | `Length` | yes | `spaces.$base * 1.4` | Vertical padding for mobile screens. |
| `tablet`  | `Length` | yes | `spaces.$base * 1` | Vertical padding for tablet screens. |
| `desktop` | `Length` | yes | `spaces.$base * 1.6` | Vertical padding for desktop screens. |
<hr>  

#### `setDisabledOpacity`  
Sets the opacity level for a disabled button.  

```scss
@include button.setDisabledOpacity( {Number} $opacity );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `opacity` | `Number` | yes | `0.65` | Defines the opacity level when the button is disabled. |
<hr>  

#### `setBoxShadow`  
Applies a box-shadow effect to the button.  

```scss
@include button.setBoxShadow( {String} $shadow );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `shadow` | `String` | yes | `'inset 0 1px 0 rgba(255, 255, 255, 0.15), 0 1px 1px rgba(0, 0, 0, 0.075)'` | Defines the shadow effect for the button. |
<hr>  

#### `setFocusBoxShadow`  
Defines the box-shadow effect when the button is focused.  

```scss
@include button.setFocusBoxShadow( {Length} $shadow );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `shadow` | `Length` | yes | `0 0 0 0.25rem` | Specifies the box-shadow applied when the button is focused. |
<hr>

### **SASS Theme**

#### `button--color`  
Defines the default text color of the button. The default value is `var(--black)`, ensuring strong readability.  
<hr>  

#### `button--color--hover`  
Specifies the text color of the button when hovered. The default value is `inherit`, meaning it will maintain the parent element's text color.  
<hr>  

#### `button--bg-color`  
Sets the background color of the button. The default value is `var(--gray-400)`, providing a neutral and balanced appearance.  
<hr>  

#### `button--bg-color--hover`  
Defines the background color of the button when hovered. The default value is `var(--gray-500)`, offering a subtle darkening effect for better visual feedback.  
<hr>  

#### `button--border-color`  
Specifies the border color of the button. The default value is `var(--gray-600)`, ensuring a clear separation from the background.  
<hr>  

#### `button--border-color--hover`  
Sets the border color of the button when hovered. The default value is `var(--gray-700)`, slightly darkening the border for improved contrast and interaction feedback.  

<!-- tabs:end -->
