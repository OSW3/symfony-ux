# Offcanvas

## What is it about ?

Create hidden side container

<!-- {"file": "00-left.html", "language": "twig"} -->


## Component configuration

```yaml
ux:
    components:
        offcanvas:
            placement: left
            animation: slide
            speed: normal
```


| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `placement` | `string` | Specifies the default position of Offcanvas. | no | `left` |
| `animation` | `string` | Specifies the animation type. | no | `slide` |
| `speed` | `string` | Specifies the animation speed. | no | `normal` |
| `has_backdrop` | `string` | Specifies wether the offcanvas has a backdrop. | no | `true` |

## Twig integration

```twig

<twig:Ux:Offcanvas 
    id="my-offcanvas" 
    header="Header content offcanvas default"
    body="Body content offcanvas default"
    footer="Footer content offcanvas default"
/>
``` 

