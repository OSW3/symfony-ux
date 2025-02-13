# Forms widgets



## What is it about ?

Create advanced forms elements



## Integration

<!-- tabs:start -->
### **Twig**

```twig
<twig:FormWidget:Widget />
``` 

### **HTML Structure**

```html
<div class="ui-form-widget">
    <label class="ui-form-widget-label">First Name</label>
    <input class="ui-form-widget-control">
    <div class="ui-form-widget-description">Write your first name</div>
</div>
``` 

### **SCSS**

```css 
@use './../../../vendor/osw3/symfony-ux/assets/sass/builders/form-widget';
```

### **JavaScript**

Import the component `FormWidgetComponent`

```js
import './../../../vendor/osw3/symfony-ux/assets/scripts/components/FormWidgetComponent';
```
<!-- tabs:end -->



## Configuration

<!-- tabs:start -->
### **Twig**

### Twig configuration

```twig 
<twig:FormWidget type="text" label="Firsname" />
<twig:FormWidget:Text label="Firstname" />
```

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `autofocus` | `boolean` | Apply `autofocus` attribute to the widget | no | false |
| `description` | `string` | Set the text of the `description` tag | no | null |
| `descriptionIcon` | `string` | Set the icon of the `description` | no | null |
| `descriptionTag` | `string` | Set the tag type of the `description` tag | no | 'p' |
| `inline` | `boolean` | Make inline widget | no | false |
| `label` | `string` | Set the text of the `label` tag | no | null |
| `labelHidden` | `boolean` | Apply the hidden attribute to the `label` tag | no | false |
| `labelIcon` | `string` | Set the icon of the `description` | no | null |
| `placeholder` | `string` | Set the placeholder. | no | null |
| `required` | `boolean` | Make the widget required | no | false |
| `title` | `string` | Set the text of the `title` attribute of the input | no | null |
| `type` | `string` | Define the type of the widget (See [type values](#typevalues)) | no | text |
| `value` | `string, array` | Set the value of the widget. `array` for `choice` or `select` | no | null |


#### `type`values

| Name | Render | Description | 
|-|-|-|
| 'checkbox' | `<input type="checkbox">` | Generate a checkbox |
| 'color' | `<input type="color">` | Generate a color picker |
| 'date' | `xxx` | xxx |
| 'email' | `<input type="email">` | Generate an email input |
| 'file' | `<input type="file">` | Generate a file picker |
| 'hidden' | `<input type="hidden">` | Generate a hidden input |
| 'month' | `xxx` | xxx |
| 'number' | `xxx` | xxx |
| 'password' | `<input type="password">` | Generate a password input |
| 'radio' | `xxx` | xxx |
| 'range' | `xxx` | xxx |
| 'search' | `<input type="search">` | Generate a search input |
| 'select' | `xxx` | xxx |
| 'tel' | `<input type="tel">` | Generate a tel input |
| 'text' | `<input type="text">` | Generate a text input |
| 'textarea' | `xxx` | xxx |
| 'time' | `xxx` | xxx |
| 'url' | `<input type="url">` | Generate a url input |
| 'week' | `xxx` | xxx |
| 'money' | `xxx` | xxx |
| 'percent' | `xxx` | xxx |
| 'uuid' | `xxx` | xxx |
| 'birthday' | `xxx` | xxx |
| 'interval' | `xxx` | xxx |
| 'datetime' | `xxx` | xxx |
| 'ulid' | `xxx` | xxx |
| 'enum' | `xxx` | xxx |
| 'integer' | `xxx` | xxx |
| 'choice' | `xxx` | xxx |
| 'currency' | `xxx` | xxx |
| 'country' | `xxx` | xxx |
| 'language' | `xxx` | xxx |
| 'locale' | `xxx` | xxx |
| 'timezone' | `xxx` | xxx |
<!-- tabs:end -->




## Customize SCSS

<!-- tabs:start -->
### **Theme**

These properties allow you to define the theme of widgets.

```css 
@use './../../../../bundle/assets/sass/storages/prefix';

$props: map.merge($props, (
    /* Required Symbol */
    'form-widget--required--color'      : var(--#{$prefix}red),
    /* Widget layout */
    'form-widget--color'                : initial,
    'form-widget--color--hover'         : initial,
    'form-widget--color--active'        : initial,
    'form-widget--bg-color'             : initial,
    'form-widget--bg-color--hover'      : initial,
    'form-widget--bg-color--active'     : initial,
    'form-widget--border-color'         : initial,
    'form-widget--border-color--hover'  : initial,
    'form-widget--border-color--active' : initial,
    /* Widget label */
    'form-widget-label--color'          : initial, // override form-widget--color
    'form-widget-label--bg-color'       : initial,
    /* Widget control */
    'form-widget-control--color'                 : inherit,
    'form-widget-control--color--hover'          : initial,
    'form-widget-control--color--active'         : initial,
    'form-widget-control--bg-color'              : var(--#{$prefix}white), 
    'form-widget-control--bg-color--hover'       : var(--#{$prefix}white), 
    'form-widget-control--bg-color--active'      : var(--#{$prefix}white), 
    'form-widget-control--border-color'          : var(--#{$prefix}gray-300),
    'form-widget-control--border-color--hover'   : var(--#{$prefix}gray-300),
    'form-widget-control--border-color--active'  : var(--#{$prefix}gray-300),
    /* Widget description */
    'form-widget-description--color'    : initial, // override form-widget--color
    'form-widget-description--bg-color' : initial, // override form-widget--color
));
```

### **Layout**
#### Custom file example

```css 
@use './../../../vendor/osw3/symfony-ux/assets/sass/storage/form-widget' as widget;

@include widget.setRequiredSymbol('*');

/* Widget layout */
@include widget.setWidgetPaddingX(0);
@include widget.setWidgetPaddingY(0);
@include widget.setWidgetBorderWidth(0);
@include widget.setWidgetBorderRadius(var(--#{$prefix}border-radius-normal));

/* Widget label */
@include widget.setLabelInlineWidth(auto);
@include widget.setLabelPaddingX(0);
@include widget.setLabelPaddingY(0);
@include widget.setLabelBorderRadius(var(--#{$prefix}border-radius-normal));

/* Widget control */
@include widget.setControlPaddingX(.75rem);
@include widget.setControlPaddingY(.375rem);
@include widget.setControlBorderWidth(1px);
@include widget.setControlBorderRadius(var(--#{$prefix}border-radius-normal));

/* Widget description */
@include widget.setDescriptionPaddingX(0);
@include widget.setDescriptionPaddingY(0);
@include widget.setDescriptionBorderRadius(var(--#{$prefix}border-radius-normal));
```

<hr>

#### Available mixins

##### `setRequiredSymbol`

Customize the symbol of required widget.

```css 
@include widget.setRequiredSymbol( {String} $symbol );
```

##### `setWidgetPaddingX` and `setWidgetPaddingY`

Customize the widget container padding.

```css 
@include widget.setWidgetPaddingX( {Length} $length );
@include widget.setWidgetPaddingY( {Length} $length );
```

##### `setWidgetBorderWidth`

xxxxxxxx

```css 
@include widget.setWidgetBorderWidth( {Length} $width );
```

##### `setWidgetBorderRadius`

xxxxxxxx

```css 
@include widget.setWidgetBorderRadius( {Length} $radius );
```

##### `setLabelInlineWidth`

xxxxxxxx

```css 
@include widget.setLabelInlineWidth( {Length} $width );
```

##### `setLabelPaddingX` and `setLabelPaddingY`

Customize the widget label padding.

```css 
@include widget.setLabelPaddingX( {Length} $length );
@include widget.setLabelPaddingY( {Length} $length );
```

##### `setLabelBorderRadius`

xxxxxxxx

```css 
@include widget.setLabelBorderRadius( {Length} $width );
```

##### `setDescriptionPaddingX` and `setDescriptionPaddingY`

Customize the widget description padding.

```css 
@include widget.setDescriptionPaddingX( {Length} $length );
@include widget.setDescriptionPaddingY( {Length} $length );
```

##### `setDescriptionBorderRadius`

xxxxxxxx

```css 
@include widget.setDescriptionBorderRadius( {Length} $width );
```

<!-- tabs:end -->