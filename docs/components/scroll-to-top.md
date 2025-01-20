# Scroll to top

## What is it about ?

Add a Scroll to top button..

## Integration

```twig
<twig:Ux:ScrollToTop />
``` 

## Configuration

<!-- tabs:start -->
### **YAML**

```yaml
symfony_ux:
    components:
        scroll_to_top: 
            top_at: 0
            toggle_at: 200
            symbol: "arrow-up"
            title: "Go to top"
```

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `top_at` | `integer` | Specifies the position of the top of the page. | no | `0` |
| `toggle_at` | `integer` | Specifies the position of the button's display or hiding point on the page. | no | `200` |
| `symbol` | `string` | Specifies the symbol of the button. | no | `arrow-up` |
| `title` | `string` | Specifies the title attribute value. | no | `Go to top` |

### **Twig Components**

### Twig configuration

```twig 
<twig:Ux:ScrollToTop />
```

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `id` | `string` | Set the accordion `id` attribute. | no |  |
| `class` | `string` | Set custom classname. | no |  |
| `dataset` | `array` | Set list of `data` attributes; | no |  |
| `top_at` * | `integer` | Specifies the position of the top of the page. | no | `0` |
| `toggle_at` * | `integer` | Specifies the position of the button's display or hiding point on the page. | no | `200` |
| `symbol` * | `string` | Specifies the symbol of the button. | no | `arrow-up` |
| `title` * | `string` | Specifies the title attribute value. | no | `Go to top` |

> Parameters marked with * override the configuration in the `config/package/symfony_ux.yaml` file.

### **SASS**

### Use the builder for button component

```scss 
@use './../../../vendor/osw3/symfony-ux/assets/sass/builders/scroll-to-top';
```

### [optional] Customize the button component layout


- `setCursor`
```scss 
@include scroll-to-top.setCursor(null); // default
```

- `setShape`
```scss 
@include scroll-to-top.setShape(square); // square, circle
```

- `setPosition`
```scss 
@include scroll-to-top.setPosition(bottom-right);
```

- `setTransition`
```scss 
@include scroll-to-top.setTransition(natural);
```

- `setTransitionDelay`
```scss 
@include scroll-to-top.setTransitionDelay(var(--#{prefix.$prefix}transition-normal));
```

- `setTransitionType`
```scss 
@include scroll-to-top.setTransitionType(ease-in-out);
```

- `setSymbol`
```scss 
@include scroll-to-top.setSymbol(arrow-up);
```

- `setZIndex`
```scss 
@include scroll-to-top.setZIndex(999999);
```

- `setSquareRadius`
```scss 
@include scroll-to-top.setSquareRadius(6px);
```

### **JavaScript**

### Import the component

```js
import './../../../vendor/osw3/symfony-ux/assets/scripts/components/ScrollToTopComponent';
```

<!-- tabs:end -->
