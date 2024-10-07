# Alerts

## What is it about ?

Provide contextual feedback messages for typical user actions.

<!-- {"file": "00-main.html", "language": "twig"} -->

## Available alerts contexts

| Name | Component | ClassName |
|-|-|-|
| Success | `<twig:Ux:Alert:Success />` | `.alert-success` |
| Warning | `<twig:Ux:Alert:Warning />` | `.alert-warning` |
| Danger | `<twig:Ux:Alert:Danger />` | `.alert-danger` |
| Info | `<twig:Ux:Alert:Info />` | `.alert-info` |
| Primary | `<twig:Ux:Alert:Primary />` | `.alert-primary` |
| Secondary | `<twig:Ux:Alert:Secondary />` | `.alert-secondary` |
| Dark | `<twig:Ux:Alert:Dark />` | `.alert-dark` |
| Light | `<twig:Ux:Alert:Light />` | `.alert-light` |
| Muted | `<twig:Ux:Alert:Muted />` | `.alert-muted` |

## Component configuration

The YAML configuration defines the parameters for all Alert components. Each component can then redefine one or more parameters when it is integrated.

```yaml
ux:
    components:
        alerts:
            dismissible: true
            delay: 0
```

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `dismissible` | `bool` | Set whether Alerts can be dismissible by default. | no | `true` |
| `delay` | `int` | Set the delay (in second) before alerts are automatically dismiss. If the value is 0, no delay will be applied. | no | `5` |

## Twig integration

**Method 1**
```twig 
<twig:Ux:Alert:Success message="This is a success message" />
``` 

**Method 2**
```twig 
<twig:Ux:Alert is="success" message="This is a success message" />
<twig:Ux:Alert is="custom-ui-color" message="My custom-ui-color alert message" />
``` 

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `is` | `string` | Set alert type, value can be <code>danger</code>, <code>success</code>, <code>warning</code>, <code>info</code>, <code>primary</code>, <code>secondary</code>, <code>light</code>, <code>dark</code>, <code>muted</code> or a custom pallette definition name | no | `success` |
| `message` | `string` | Set alert message | yes |  |
| `dismissible` | `bool` | Set whether Alert can be dismissible by default | no | `true` |
| `delay` | `int` | Set the delay (in second) before alert is automatically dismiss. If the value is 0, no delay will be applied. | no | `5` |