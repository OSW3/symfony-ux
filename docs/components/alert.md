# Alerts

## What is it about ?

Provide contextual feedback messages for typical user actions.
<br>

## Available alerts contexts

| Name | Component | ClassName |
|-|-|-|
| Success | `<twig:Alert:Success />` | `.alert-success` |
| Warning | `<twig:Alert:Warning />` | `.alert-warning` |
| Danger | `<twig:Alert:Danger />` | `.alert-danger` |
| Info | `<twig:Alert:Info />` | `.alert-info` |
| Primary | `<twig:Alert:Primary />` | `.alert-primary` |
| Secondary | `<twig:Alert:Secondary />` | `.alert-secondary` |
| Dark | `<twig:Alert:Dark />` | `.alert-dark` |
| Light | `<twig:Alert:Light />` | `.alert-light` |
| Muted | `<twig:Alert:Muted />` | `.alert-muted` |
<br>

## Component configuration

```yaml
ux:
    components:
        alerts:
            dismissible: true
            delay: 0
```
<br>

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `dismissible` | `bool` | Set whether Alerts can be dismissible by default. | no | `true` |
| `delay` | `int` | Set the delay (in second) before alerts are automatically dismiss. If the value is 0, no delay will be applied. | no | `5` |
<br>

## Twig integration

```twig 
<!-- Method 1 -->
<twig:Alert:Success message="This is a success message" />

<!-- Method 2 -->
<twig:Alert is="success" message="This is a success message" />
``` 

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `is` | `string` | Set alert type | no | `success` |
| `message` | `string` | Set alert message | yes |  |
| `dismissible` | `bool` | Set whether Alert can be dismissible by default | no | `true` |
| `delay` | `int` | Set the delay (in second) before alert is automatically dismiss. If the value is 0, no delay will be applied. | no | `5` |