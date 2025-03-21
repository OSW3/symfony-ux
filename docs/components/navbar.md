# Navbar



## What is it about ?

Create the navbar component.



## Code example

<!-- tabs:start -->
### **YAML**
```yaml
# config/packages/symfony_ux.yaml
symfony_ux:
    components:
        navbar:
            backdrop: true
            brand: true
            container: null
            expandAt: laptop
            placement: right
            sticky: false
            tag: header
            justify: between
```

### **Twig**

```twig 
<twig:Component:Header
    :backdrop="true"
    :brand="true"
    container="desktop"
    placement="left"
    id="my-custom-id"
    class="my-custom-class"
    :sticky="false"
    tag="header"
    :schema="[]"
    justify="between"
/>
```

### **SCSS**

#### Customize layout example

```css 
/* assets/sass/components/header.scss */
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storage/header';
@include header.setMinHeight(48px);
// ...
```

#### Customize theme example

```css 
/* assets/sass/themes/_light.scss */
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storages/themes';
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storages/prefix';
@include themes.add('light', (
    'header--color': var(--#{$prefix}black),
    // ...
));
```

#### Import the component builder

```css 
/* assets/sass/ui.scss */
@use '<vendor-path>/osw3/symfony-ux/assets/sass/builders/header';
```

### **JavaScript**

```js
import '<vendor-path>/osw3/symfony-ux/assets/scripts/components/HeaderComponent';
```
<!-- tabs:end -->



## API

<!-- tabs:start -->
### **YAML**

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|:-|
| **`backdrop`** | `bool` | no | `true` | Indicates whether a blurred background should be displayed when the component is visible. |
| **`brand`** | `array,bool` | no | `true` | Defines the properties of the Brand component. Set to `false` to disable the Brand, `true` to use default properties, or provide an `array` to customize the properties. |
| **`container`** | `string,null` | no | `null` | Specifies the type of the container |
| **`expandAt`** | `string` | no | null | Specifies the breakpoint to expand or toggle between mobile and desktop views. |
| **`placement`** | `string` | no | `left` | Defines the mobile placement of the component (left, right). |
| **`sticky`** | `bool` | no | `false` | Indicates whether the component should be sticky. |
| **`tag`** | `string` | no | `header` | Defines the tag name of the component. |
| **`justify`** | `string` | no | `between` | . |


### **Twig**
> Note: Parameters with • override the YAML configuration.

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|:-|
| **`id`** | `string` | no | null | xxx |
| **`class`** | `string` | no | null | xxx |
| **`backdrop•`** | `bool` | no | `true` | Indicates whether a blurred background should be displayed when the component is visible. |
| **`brand•`** | `array,bool` | no | `true` | Specifies the properties of the Brand component. `false` to no brand, `true` to get the Brand component properties and `array` to define your own properties |
| **`container•`** | `string,null` | no | `null` | Specifies the type of the container |
| **`placement•`** | `string` | no | `left` | Defines the mobile placement of the component (left, right). |
| **`sticky•`** | `bool` | no | `false` | Indicates whether the component should be sticky. |
| **`tag•`** | `string` | no | `header` | Defines the tag name of the component. |
| **`schema`** | `array` | no | `[]` | . |
| **`justify`** | `string` | no | `between` | . |


### **SASS Layout**

@include header.setExpandAt(laptop);
@include header.setRowInverse(false);
@include header.setBackdropBlur(4px);
@include header.setBackdropOpacity(0.5);
@include header.setBrandOffset(1rem); // Decalage vers la gauche ou la droite du composant Brand pour compenser la marge du container
@include header.setBrandGap(1rem); // Applique un espace entre le composant Brand et le menu


### **SASS Theme**

#### `header--backdrop--bg-color`  
Xxx.
<hr>  

#### `header--bg-color`  
Xxx.
<hr>  

#### `header--offcanvas--bg-color`  
Xxx.
<hr>  

<!-- tabs:end -->