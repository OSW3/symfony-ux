# Header



## What is it about ?

Create the header componet.



## Integration

<!-- tabs:start -->
### **Twig**

```twig
<twig:Component:Header />
``` 

### **SCSS**

```css 
@use '<vendor-path>/osw3/symfony-ux/assets/sass/builders/header';
```
<!-- tabs:end -->



## Configuration

<!-- tabs:start -->
### **YAML**

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `container` | `string` | xxx | no | null |
| `placement` | `string` | Defines the mobile placement of the component (left, right, top). | no | `left` |
| `sticky` | `bool` | Indicates whether the component should be sticky. | no | `false` |
| `tag` | `string` | Defines the tag name of the component. | no | `header` |

```yaml
symfony_ux:
    components:
        header:
            container: null
            placement: left
            sticky: false
            tag: header
```

### **Twig**

### Twig configuration

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `id` | `string` | xxx | no | null |
| `class` | `string` | xxx | no | null |
| `container` | `string` | xxx | no | null |
| `placement•` | `string` | Defines the mobile placement of the component (left, right, top). | no | `left` |
| `sticky•` | `bool` | Indicates whether the component should be sticky. | no | `false` |
| `tag•` | `string` | Defines the tag name of the component. | no | `header` |

> Note: Parameters with • override the YAML configuration.

```twig 
<twig:Component:Header
    class="my-custom-class"
    container="desktop"
    id="my-custom-id"
    placement="left"
    tag="header"
    sticky
    :schema="[]"
/>
```
<!-- tabs:end -->