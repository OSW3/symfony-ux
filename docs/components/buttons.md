# Buttons

## What is it about ?

Create advanced buttons.

## Integration

<!-- tabs:start -->

### **button**

#### HTML component

##### Basic HTML integration

```twig
<button type="button" class="ux-button">My button</button> 
``` 

##### HTML integration with `classname` function

```twig
<button type="button" class="{{ classname('button') }}">My button</button> 
``` 

#### Twig component

```twig
<twig:Ux:Button label="My button" />
``` 

### **submit**

#### HTML component

##### Basic HTML integration

```twig
<button type="submit" class="ux-button">My submit button</button> 
``` 

##### HTML integration with `classname` function

```twig
<button type="submit" class="{{ classname('button') }}">My submit button</button> 
``` 

#### Twig component

```twig
<twig:Ux:Button:Submit label="My submit button" />
``` 

### **reset**

#### HTML component

##### Basic HTML integration

```twig
<button type="reset" class="ux-button">My reset button</button> 
``` 

##### HTML integration with `classname` function

```twig
<button type="reset" class="{{ classname('button') }}">My reset button</button> 
``` 

#### Twig component

```twig
<twig:Ux:Button:Reset label="My reset button" />
``` 

### **link**

#### HTML component

##### Basic HTML integration

```twig
<a href="#" class="ux-button">My button</a> 
``` 

##### HTML integration with `classname` function

```twig
<a href="#" class="{{ classname('button') }}">My link button</a> 
``` 

#### Twig component

```twig
<twig:Ux:Button:Link label="My link button" />
<twig:Ux:Button type="link" label="My link button" />
``` 

<!-- tabs:end -->


## Configuration

<!-- tabs:start -->
### **YAML**

This component has no configuration in the `symfony_ux.yaml` file

### **Twig Components**

### Twig configuration

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

### **SASS**

### [optional] Customize the button component layout

```scss 
@use './../../../vendor/osw3/symfony-ux/assets/sass/storages/prefix';
@use './../../../vendor/osw3/symfony-ux/assets/sass/storages/spaces';
@use './../../../vendor/osw3/symfony-ux/assets/sass/storages/button';

@include button.padding-x(spaces.$base * .6);
@include button.padding-y(spaces.$base * 1.4);
@include button.border-width(1px);
@include button.border-radius(var(--#{prefix.$prefix}border-radius-half-pill));
@include button.font-family(var(--#{prefix.$prefix}font-monospace));
@include button.font-size(1rem);
@include button.font-weight(400);
@include button.line-height(1.5);
@include button.box-shadow('inset 0 1px 0 rgba(255, 255, 255, 0.15), 0 1px 1px rgba(0, 0, 0, 0.075)');
@include button.disabled-opacity(0.65);
@include button.focus-box-shadow(0 0 0 0.25rem);
```

### Use the builder for button component

```scss 
@use './../../../vendor/osw3/symfony-ux/assets/sass/builders/button';
```

<!-- tabs:end -->
