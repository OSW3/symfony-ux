# Copyright



## What is it about ?

Display a copyright, generally on the website footer.



## Code example

<!-- tabs:start -->
### **YAML**
```yaml
# config/packages/symfony_ux.yaml
symfony_ux:
    components:
        copyright: 
            company: "My Company"
            since: 2009
            symbol: "&copy;"
            dates_separator: "-"
            separator: " • "
```

### **HTML**

```html
<div class="{{ classname('copyright') }}">&copy; 2009-2025 • My Company</div>
``` 

### **Twig**

#### Example 1

```twig
<twig:Component:Copyright />
``` 

#### Example 2

```twig 
<twig:Component:Copyright 
    company="My awesome company" 
    since="2025" 
/>
```

### **SCSS**

#### Customize layout example

```css 
/* assets/sass/components/copyright.scss */
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storage/copyright';
@include copyright.setCursor(null);
// ...
```

#### Customize theme example

```css 
/* assets/sass/themes/_light.scss */
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storages/themes';
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storages/prefix';
@include themes.add('light', (
    'copyright--color': var(--#{$prefix}black),
    // ...
));
```

#### Import the component builder

```css 
/* assets/sass/ui.scss */
@use '<vendor-path>/osw3/symfony-ux/assets/sass/builders/copyright';
```
<!-- tabs:end -->



## API

<!-- tabs:start -->
### **YAML**

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|:-|
| `company` | `string` | no |  | Set the name of the company. |
| `since` | `string` | no | current year  | Set the year since the company has been active. |
| `symbol` | `string` | no | \&copy; | Set the copyright symbol to use. |
| `dates_separator` | `string` | no | - | Set the separator to use between dates in the display. |
| `separator` | `string` | no | • | Set the separator to use between elements in the display. |


### **Twig**
> Note: Parameters with • override the YAML configuration.

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|:-|
| `id` | `string` | no |  | Set the accordion `id` attribute. |
| `class` | `string` | no |  | Set custom classname. |
| `dataset` | `array` | no |  | Set list of `data` attributes; |
| `company` • | `string` | no |  | Set the name of the company. |
| `since` • | `string` | no | current year  | Set the year since the company has been active. |
| `symbol` • | `string` | no | \&copy; | Set the copyright symbol to use. |
| `dates_separator` • | `string` | no | - | Set the separator to use between dates in the display. |
| `separator` • | `string` | no | • | Set the separator to use between elements in the display. |


### **SASS Layout**

#### `setCursor`  
Sets the cursor style for the copyright component.  

```css
@include copyright.setCursor(null);
```

| Parameter | Type  | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `cursor` | `CSS cursor value` | no | `null` | Defines the cursor type when hovering over the component. |

<hr>

#### `setFontFamily`  
Sets the font family for the copyright text.  

```css
@include copyright.setFontFamily(null);
```

| Parameter | Type  | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `fontFamily` | `CSS font-family` | no | `null` | Defines the font family used for the text. |

<hr>

#### `setFontSize`  
Defines the font size of the copyright text.  

```css
@include copyright.setFontSize(fonts.$scale-base * .8);
```

| Parameter  | Type  | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `size` | `Length` | yes | `fonts.$scale-base * .8` | Sets the font size for the text. |

<hr>

#### `setFontWeight`  
Specifies the font weight of the copyright text.  

```css
@include copyright.setFontWeight(100 * 4);
```

| Parameter  | Type  | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `weight`   | `Number` | yes | `100 * 4` | Defines the thickness of the text. |

<hr>

#### `setPaddingX`  
Sets the horizontal padding of the copyright component.  

```css
@include copyright.setPaddingX(0);
```

| Parameter  | Type  | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `paddingX` | `Length` | yes | `0` | Defines the left and right padding. |

<hr>

#### `setPaddingY`  
Sets the vertical padding of the copyright component.  

```css
@include copyright.setPaddingY(0);
```

| Parameter  | Type  | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `paddingY` | `Length` | yes | `0` | Defines the top and bottom padding. |

<hr>

#### `setTransition`  
Enables or disables transition effects.  

```css
@include copyright.setTransition(false);
```

| Parameter | Type  | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `enabled` | `Boolean` | yes | `false` | Enables (`true`) or disables (`false`) transitions. |

<hr>

#### `setTransitionDelay`  
Defines the delay before the transition starts.  

```css
@include copyright.setTransitionDelay(var(--#{$prefix}transition-normal));
```

| Parameter | Type  | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `delay` | `CSS time value` | yes | `var(--transition-normal)` | Specifies the time before the transition begins. |

<hr>

#### `setTransitionType`  
Sets the type of transition easing function.  

```css
@include copyright.setTransitionType(ease-in-out);
```

| Parameter | Type  | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `type` | `CSS easing function` | yes | `ease-in-out` | Determines how the transition progresses. |

<hr>

#### `setHover`  
Enables or disables hover effects.  

```css
@include copyright.setHover(false);
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `enabled` | `Boolean` | yes | `false` | Enables (`true`) or disables (`false`) hover styles. |

<hr>

### **SASS Theme**

#### `brand--color`  
Defines the text color of the brand. The default value is set to `var(--gray-800)`, ensuring good readability and contrast.  
<hr>  

#### `brand--color--hover`  
Specifies the text color of the brand when hovered. The default value is `var(--blue)`, providing a visual cue for interaction.  
<hr>  

#### `brand--bg-color`  
Defines the background color of the brand. The default value is `transparent`, keeping the design clean and adaptable to different layouts.  
<hr>  

#### `brand--bg-color--hover`  
Specifies the background color of the brand when hovered. The default value is `transparent`, maintaining consistency with the default state.  
<hr>  

#### `brand--border-color`  
Sets the border color of the brand. The default value is `var(--gray-200)`, offering a subtle separation from surrounding elements.  
<hr>  

#### `brand--border-color--hover`  
Defines the border color of the brand when hovered. The default value is `var(--gray-500)`, enhancing visibility on interaction.  
<!-- tabs:end -->
