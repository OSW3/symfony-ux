# Buttons



## What is it about ?

Create advanced buttons.



## Integration

<!-- tabs:start -->
### **HTML**

```twig
<button type="button" class="ux-button">My button</button>
<button type="submit" class="ux-button">My button</button>
<button type="reset" class="ux-button">My button</button>
<a href="#" class="ux-button">My button</a>
``` 

```twig 
<button type="button" class="ux-button ux-button-primary">primary</button>
<button type="button" class="ux-button ux-button-secondary">secondary</button>
<button type="button" class="ux-button ux-button-success">Success</button>
<button type="button" class="ux-button ux-button-danger">Danger</button>
<button type="button" class="ux-button ux-button-warning">Warning</button>
<button type="button" class="ux-button ux-button-info">Info</button>
<button type="button" class="ux-button ux-button-light">Light</button>
<button type="button" class="ux-button ux-button-dark">Dark</button>
<button type="button" class="ux-button ux-button-my-custom-palette">my-custom-palette</button>
```

### **Twig**

```twig
<twig:Component:Button label="My button" />
<twig:Component:Button:Submit label="My button" />
<twig:Component:Button:Reset label="My button" />
<twig:Component:Button:Link url="#" label="My button" />
``` 

```twig 
<twig:Component:Button is="primary" label="primary" />
<twig:Component:Button is="secondary" label="secondary" />
<twig:Component:Button is="success" label="Success" />
<twig:Component:Button is="danger" label="Danger" />
<twig:Component:Button is="warning" label="Warning" />
<twig:Component:Button is="info" label="Info" />
<twig:Component:Button is="light" label="Light" />
<twig:Component:Button is="dark" label="Dark" />
<twig:Component:Button type="button" label="my-custom-palette" />
```

### **SCSS**

Import the builder `_button.scss`

```css 
@use './../../../vendor/osw3/symfony-ux/assets/sass/builders/button';
```
<!-- tabs:end -->



## Configuration

<!-- tabs:start -->
### **YAML**

> This component has no YAML configuration.

### **Twig**

### Twig configuration

> Note: Parameters with • override the YAML configuration.

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `id` | `string` | Set the accordion `id` attribute. | no |  |
| `class` | `string` | Set custom classname. | no |  |
| `dataset` | `array` | Set list of `data` attributes; | no |  |
| `type` | `string` | Set the type of the button. | no | `button` |
| `label` | `string` | Set the label of the button. | no |  |
| `disabled` | `bool` | If true, the button will disabled. | no | `false` |
| `url` | `string` | Set the url of the link button. | if type `link` |  |
| `target` | `string` | Set the target of the link. | no | `_self` |
| `is` | `string` | Set the palette  style. | no | `primary` |
| `outline` | `bool` | If true, apply the outline style of the palette. | no | `false` |
| `size` | `string` | Set the size of the button. | no | `medium` |
| `block` | `bool` | If true the button will displayed as a block. | no | `false` |

<hr>

#### `type` values

| Value | Description |
|-|-|
| `button` | Set a button type Button |
| `submit` | Set a button type Submit |
| `reset` | Set a button type Reset |
| `link` | Set a button as a link |

#### `target` values

| Value | Description |
|-|-|
| `_self` | Set a link with target _self |
| `_parent` | Set a link with target _parent |
| `_blank` | Set a link with target _blank |
| `custom` | Set a link with a custom target |

#### `is` values

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

#### `size` values

| Value | Description |
|-|-|
| `small` | Set the style `small` |
| `normal` | Set the style `normal` |
| `medium` | Set the style `medium` |
| `large` | Set the style `large` |

<!-- tabs:end -->



## Customize SCSS

<!-- tabs:start -->

### **Theme**

These properties allow you to define the theme of buttons that are not associated with a palette.

```css 
@use './../../../../bundle/assets/sass/storages/prefix';

$props: map.merge($props, (
    example-color             : var(--#{$prefix}black),
    example--color--hover       : inherit,
    example--bg-color          : var(--#{$prefix}yellow),
    example--bg-color--hover    : var(--#{$prefix}green),
    example--border-color      : var(--#{$prefix}gray-600),
    example--border-color--hover: var(--#{$prefix}gray-700),
));
```

### **Layout**

#### Custom file example

```css 
@use './../../../vendor/osw3/symfony-ux/assets/sass/storage/button';

@include button.setBorderWidth( 1px );
@include button.setBorderRadius( var(--#{$prefix}border-radius-normal) );
@include button.setCursor( pointer );
@include button.setFontFamily( inherit );
@include button.setFontSize(fonts.$scale-base * 1, fonts.$scale-base * .8 , fonts.$scale-base * 1.6 );
@include button.setFontWeight(100 * 4, 100 * 4, 100 * 7);
@include button.setLineHeight(1.5, 1, 1.8);
@include button.setPaddingX(spaces.$base * .6, spaces.$base * .4, spaces.$base * 1);
@include button.setPaddingY(spaces.$base * 1.4, spaces.$base * 1, spaces.$base * 1.6);
@include button.setDisabledOpacity( 0.65 );
@include button.setBoxShadow('inset 0 1px 0 rgba(255, 255, 255, 0.15), 0 1px 1px rgba(0, 0, 0, 0.075)');
@include button.setFocusBoxShadow( 0 0 0 0.25rem );
```

<hr>

#### Available mixins

##### `setBorderWidth`

Sets the border width of the button.

```css 
@include button.setBorderWidth( {Length} $width );
```

##### `setBorderRadius`

Sets the border radius of the button for rounded corners.

```css 
@include button.setBorderRadius( {Length} $radius );
```

##### `setCursor`

Sets the cursor style when hovering over the button.

```css 
@include button.setCursor( {Cursor} $cursor );
```

##### `setFontFamily`

Sets the font family for the button's text.

```css 
@include button.setFontFamily( {String} $family );
```

##### `setFontSize`

Sets the font size of the button for different screen sizes.

```css 
@include button.setFontSize( {Length} $normal, {Length} $small, {Length} $large );
```

##### `setFontWeight`

Sets the font weight of the button's text for different screen sizes.

```css 
@include button.setFontWeight( {Number} $normal, {Number} $small, {Number} $large );
```

##### `setLineHeight`

Sets the line height of the button's text for different screen sizes..

```css 
@include button.setLineHeight( {Number} $normal, {Number} $small, {Number} $large );
```

##### `setPaddingX`

Sets the horizontal padding of the button for different screen sizes.

```css 
@include button.setPaddingX( {Length} $normal, {Length} $small, {Length} $large );
```

##### `setPaddingY`

Sets the vertical padding of the button for different screen sizes.

```css 
@include button.setPaddingY( {Length} $normal, {Length} $small, {Length} $large );
```

##### `setDisabledOpacity`

Sets the opacity for the button when it is in a disabled state.

```css 
@include button.setDisabledOpacity( {Number} $opacity );
```

##### `setBoxShadow`

Sets the box-shadow for the button, often used to create depth or visual emphasis..

```css 
@include button.setBoxShadow( {String} $shadow );
```

##### `setFocusBoxShadow`

Sets the focus outline box-shadow for the button, often used for accessibility purposes..

```css 
@include button.setFocusBoxShadow( {String} $shadow );
```

<!-- tabs:end -->
