# Link



## What is it about ?

Create an advanced link.



## Integration

<!-- tabs:start -->
### **HTML**

```twig
<a class="ux-link" href="#">My link</a>
``` 

### **Twig**

```twig
<twig:Component:Link label="My link" url="#" />
``` 

### **SCSS**

Import the builder `_example.scss`

```css 
@use './../../../vendor/osw3/symfony-ux/assets/sass/builders/link';
```
<!-- tabs:end -->



## Configuration

<!-- tabs:start -->
### **YAML**

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `target` | `string` | Specifies the window target of links. | no | `_self` |

```yaml
symfony_ux:
    components:
        links:
            target: _self
```

### **Twig**

### Twig configuration

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `id` | `string` | Set the accordion `id` attribute. | no |  |
| `class` | `string` | Set custom classname. | no |  |
| `dataset` | `array` | Set list of `data` attributes; | no |  |
| `label` | `string` | Set the label of the link. | yes |  |
| `url` | `string` | Set the destination of the link. | yes |  |
| `• target` | `string` | Specifies the window target of links. | no | `_self` |
| `isDisabled` | `bool` | If true, the link is not clickable. | no | `false` |
| `noClassLink` | `bool` | If true, the base classname is removed. | no | `false` |


> Note: Parameters with • override the YAML configuration.

```twig 
<twig:Component:Link 
    label="My link" 
    url="https://github.com/osw3/symfony-ux" 
    target="_blank" 
/>
```
<!-- tabs:end -->




## Customize SCSS

<!-- tabs:start -->

### **Theme**

```css 
@use './../../../../bundle/assets/sass/storages/prefix';

$props: map.merge($props, (
    'link--color'                       : var(--#{$prefix}blue),
    'link--color--hover'                 : var(--#{$prefix}green),
    'link--color--active'                : var(--#{$prefix}orange),
    'link--disabled--color'              : var(--#{$prefix}gray-600),
    'link-text-decoration--color'       : var(--#{$prefix}blue),
    'link-text-decoration--color--hover' : var(--#{$prefix}green),
    'link-text-decoration--color--active': var(--#{$prefix}orange),
    'link--bg-color'                    : initial,
    'link--bg-color--hover'              : initial,
    'link--bg-color--active'             : initial,
));
```

### **Layout**

#### Custom file example

```css 
@use './../../../vendor/osw3/symfony-ux/assets/sass/storage/prefix';
@use './../../../vendor/osw3/symfony-ux/assets/sass/storage/link';

@include link.setCursor(pointer);
@include link.setTextDecoration(none, underline, underline);
@include link.setTransition(true);
@include link.setTransitionDelay(var(--#{$prefix}transition-normal));
@include link.setTransitionType(ease-in-out);
```

<hr>

#### Available mixins

##### `setCursor`

Sets the cursor style when hovering over the button.

```css 
@include link.setCursor( {Cursor} $cursor );
```

##### `setTextDecoration`

Sets the text decoration properties.

```css 
@include link.setTextDecoration( {String} $normal, {String} $hover, {String} $active );
```

##### `setTransition`

Enables or disables transitions for the brand's elements.

```css 
@include link.setTransition( {Boolean} $enabled  );
```

##### `setTransitionDelay`

Sets the transition delay for the brand's elements.

```css 
@include link.setTransitionDelay( {Length} $delay );
```

##### `setTransitionType`

Sets the transition type (easing function) for the brand's elements.

```css 
@include link.setTransitionType( {String} $type );
```
<!-- tabs:end -->
