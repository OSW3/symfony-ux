# Link



## What is it about ?

Create an advanced link.



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
| `target` | `string` | Specifies the window target of links. | no | `_self` |
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
