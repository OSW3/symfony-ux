# Example Component



## What is it about ?

Example component description.



## Code example

<!-- tabs:start -->
### **YAML**
```yaml
# config/packages/symfony_ux.yaml
symfony_ux:
    components:
        xxx:
```

### **HTML**

#### Example 1

```html
<div class="ui-example"></div>
``` 

#### Example 2

```html
<div class="{{ classname('example') }}"></div>
``` 

### **Twig**

#### Example 1

```twig
<twig:Component:Example />
``` 

### **SCSS**

#### Customize layout example

```css 
/* assets/sass/components/example.scss */
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storage/example';
@include example.setMinHeight(48px);
// ...
```

#### Customize theme example

```css 
/* assets/sass/themes/_light.scss */
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storages/themes';
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storages/prefix';
@include themes.add('light', (
    'example--color': var(--#{$prefix}black),
    // ...
));
```

#### Import the component builder

```css 
/* assets/sass/ui.scss */
@use '<vendor-path>/osw3/symfony-ux/assets/sass/builders/example';
```

### **JavaScript**

```js
import '<vendor-path>/osw3/symfony-ux/assets/scripts/components/ExampleComponent';
```
<!-- tabs:end -->



## API

<!-- tabs:start -->
### **YAML**

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|:-|
| **`property_1`** | `string` | yes |  | Description of `property_1`|
| **`property_2`** | `string` | no |  | Description of `property_1`|


### **Twig**
> Note: Parameters with • override the YAML configuration.

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|:-|
| **`property_1`** | `string` | yes |  | Description of `property_1`|
| **`property_2•`** | `string` | no |  | Description of `property_1`|


### **SASS Layout**

#### `setValue`
Set the value of the component

```css 
@include example.setValue( {Length} $height  );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `height` | `Length` | yes | xxx | xxx |
<hr>
```

### **SASS Theme**

#### `example--color`  
Defines the text color of the example. The default value is set to `var(--white)`, ensuring high readability.  
<hr>  
<!-- tabs:end -->
