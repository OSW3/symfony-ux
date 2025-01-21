# Example Component



## What is it about ?

Example component description.



## Integration

<!-- tabs:start -->
### **HTML**

```twig
<div class="ux-example"></div>
``` 

### **Twig**

```twig
<twig:Component:Example />
``` 

### **SCSS**

Import the builder `_example.scss`

```css 
@use './../../../vendor/osw3/symfony-ux/assets/sass/builders/example';
```

### **JavaScript**

Import the component `ExampleComponent`

```js
import './../../../vendor/osw3/symfony-ux/assets/scripts/components/ExampleComponent';
```
<!-- tabs:end -->



## Configuration

<!-- tabs:start -->
### **YAML**

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `property_1` | `string` | Description of `property_1`  | yes |  |
| `property_2` | `string` | Description of `property_1`  | no |  |

```yaml
symfony_ux:
    components:
        example:
            property_1: value 1
            property_2: value 2
```

### **Twig**

### Twig configuration

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `property_1` | `string` | Description of `property_1`  | yes |  |
| `property_2` • | `string` | Description of `property_1`  | no |  |

> Note: Parameters with • override the YAML configuration.

```twig 
<twig:Component:Example 
    property_1="value 1" 
    property_2="value 2"
/>
```
<!-- tabs:end -->



## Customize SCSS

<!-- tabs:start -->

### **Theme**

```css 
@use './../../../../bundle/assets/sass/storages/prefix';

$props: map.merge($props, (
    example-color             : var(--#{prefix.$prefix}black),
    example-hover-color       : var(--#{prefix.$prefix}orange),
    example-bg-color          : var(--#{prefix.$prefix}yellow),
    example-hover-bg-color    : var(--#{prefix.$prefix}green),
    example-border-color      : var(--#{prefix.$prefix}gray-600),
    example-hover-border-color: var(--#{prefix.$prefix}gray-700),
));
```

### **Layout**

#### Custom file example

```css 
@use './../../../vendor/osw3/symfony-ux/assets/sass/storage/example';

@include example.setPadding(1rem);
@include example.setTransitionType(ease-in-out);
```

<hr>

#### Available mixins

##### `setPadding`

Mixin include definition.

```css 
@include example.setPadding(1rem);
```

##### `setUselessBreakpoints`

Mixin include definition.

```css 
@include example.setTransitionType(ease-in-out);
```
<!-- tabs:end -->



## JavaScript events
