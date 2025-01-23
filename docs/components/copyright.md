# Copyright



## What is it about ?

Display a copyright, generally on the website footer.



## Integration

<!-- tabs:start -->
### **HTML**

```twig
<div class="ux-copyright">&copy; 2009-2025 • My Company</div>
``` 

### **Twig**

```twig
<twig:Component:Copyright />
``` 

### **SCSS**

Import the builder `_example.scss`

```css 
@use './../../../vendor/osw3/symfony-ux/assets/sass/builders/copyright';
```
<!-- tabs:end -->



## Configuration

<!-- tabs:start -->
### **YAML**

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `company` | `string` | Set the name of the company. | no |  |
| `since` | `string` | Set the year since the company has been active. | no | current year  |
| `symbol` | `string` | Set the copyright symbol to use. | no | \&copy; |
| `dates_separator` | `string` | Set the separator to use between dates in the display. | no | - |
| `separator` | `string` | Set the separator to use between elements in the display. | no | • |

```yaml
symfony_ux:
    components:
        copyright: 
            company: "My Company"
            since: 2009
            symbol: "&copy;"
            dates_separator: "-"
            separator: " • "
```

### **Twig**

### Twig configuration

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `id` | `string` | Set the accordion `id` attribute. | no |  |
| `class` | `string` | Set custom classname. | no |  |
| `dataset` | `array` | Set list of `data` attributes; | no |  |
| `company` • | `string` | Set the name of the company. | no |  |
| `since` • | `string` | Set the year since the company has been active. | no | current year  |
| `symbol` • | `string` | Set the copyright symbol to use. | no | \&copy; |
| `dates_separator` • | `string` | Set the separator to use between dates in the display. | no | - |
| `separator` • | `string` | Set the separator to use between elements in the display. | no | • |

> Note: Parameters with • override the YAML configuration.

```twig 
<twig:Component:Copyright 
    company="My awesome company" 
    since="2025" 
/>
```
<!-- tabs:end -->



## Customize SCSS

<!-- tabs:start -->

### **Theme**

```css 
@use './../../../../bundle/assets/sass/storages/prefix';

$props: map.merge($props, (
    example-color             : inherit,
    example-hover-color       : inherit,
    example-bg-color          : inherit,
    example-hover-bg-color    : inherit,
));
```

### **Layout**

#### Custom file example

```css 
@use './../../../vendor/osw3/symfony-ux/assets/sass/storage/copyright';

@include copyright.setCursor(null);
@include copyright.setFontFamily(null);
@include copyright.setFontSize(fonts.$scale-base * .8);
@include copyright.setFontWeight(100 * 4);
@include copyright.setPaddingX(0);
@include copyright.setPaddingY(0); 
@include copyright.setTransition(false);
@include copyright.setTransitionDelay(var(--#{prefix.$prefix}transition-normal));
@include copyright.setTransitionType(ease-in-out);
@include copyright.setHover(false);
```

<hr>

#### Available mixins

##### `setCursor`

Sets the cursor style for the copyright element. If null, it defaults to the system or inherited style.

```css 
@include copyright.setCursor( {Cursor|Null} $cursor );
```

##### `setFontFamily`

Sets the font family for the copyright element. If null, it defaults to the system or inherited font.

```css 
@include copyright.setFontFamily( {String|Null} $family );
```

##### `setFontSize`

Sets the font size for the copyright element.

```css 
@include copyright.setFontSize( {Length} $size );
```

##### `setFontWeight`

Sets the font weight for the copyright element.

```css 
@include copyright.setFontWeight( {Number} $weight );
```

##### `setPaddingX`

Sets the horizontal padding for the copyright element.

```css 
@include copyright.setPaddingX( {Length} $padding );
```

##### `setPaddingY`

Sets the vertical padding for the copyright element.

```css 
@include copyright.setPaddingY( {Length} $padding ; 
```

##### `setTransition`

Enables or disables transitions for the copyright element.

```css 
@include copyright.setTransition( {Boolean} $enabled );
```

##### `setTransitionDelay`

Sets the transition delay for the copyright element.

```css 
@include copyright.setTransitionDelay( {Length} $delay );
```

##### `setTransitionType`

Sets the transition type (easing function) for the copyright element.

```css 
@include copyright.setTransitionType( {String} $type );
```

##### `setHover`

Enables or disables hover effects for the copyright element.

```css 
@include copyright.setHover( {Boolean} $enabled );
```
<!-- tabs:end -->
