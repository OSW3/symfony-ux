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
| `description` | `string` | Set the text of the `description` tag  | no |  |
| `label` | `string` | Set the text of the `label` tag  | no |  |
| `title` | `string` | Set the text of the `title` attribute of the input  | no |  |
| `required` | `boolean` | Make the widget required  | no | false |
| `type` | `string` | Define the type of the widget (See [type values](#typevalues))  | no |  |


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

### **Layout**
#### Custom file example

```css 
@use './../../../vendor/osw3/symfony-ux/assets/sass/storage/form-widget' as widget;

@include widget.setRequiredSymbol('*');
```

<hr>

#### Available mixins

##### `setRequiredSymbol`

Customize the symbol of required widget.

```css 
@include widget.setRequiredSymbol( {String} $symbol );
```

<!-- tabs:end -->