# Analytics

## What is it about ?

Add analytics service to your app.

<!-- {"file": "main.html", "language": "twig", "render": false} -->

## Supported services

| Provider | ID | Website | 
|-|-|-|
| Clicky | `clicky` | [https://clicky.com/](https://clicky.com/) | 
| Google Analytics | `google` | [https://analytics.google.com/](https://analytics.google.com/) | 
| GoSquared | `go_squared` | [https://www.gosquared.com/](https://www.gosquared.com/) | 
| Heap | `heap` | [https://heap.io/](https://heap.io/) | 
| Matomo | `matomo` | [https://matomo.org/](https://matomo.org/) | 
| Piwik | `piwik` | [https://piwik.pro/](https://piwik.pro/) | 
| Plausible | `plausible` | [https://plausible.io/](https://plausible.io/) | 
| Woopra | `woopra` | [https://woopra.com/](https://woopra.com/) | 

## Component configuration

```yaml
ux: 
    components: 
        analytics: 
            provider:
                tracking_id: 1234
                tracking_url https://mysite.provider.url/
                tracking_domain mysite.com
```

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `tracking_id` | `int\|string` | Set the tracking ID. | no |  |
| `tracking_url` | `string` | Set the tracking URL. | no |  |
| `tracking_domain` | `string` | Set the tracking domain. | no |  |

### Required options by provider

| Provider | tracking_id | tracking_url | tracking_domain | 
|-|:-:|:-:|:-:|
| Clicky | x |  |  | 
| Google Analytics | x |  |  | 
| GoSquared | x |  |  | 
| Heap | x |  |  | 
| Matomo | x | x |  | 
| Piwik | x | x |  | 
| Plausible |  |  | x | 
| Woopra |  |  | x | 


## Twig integration

### Method 1 

This method suppose the Tracking ID is defined in the `symfony_ux.yaml` configuration

```twig 
<twig:Ux:Analytics:Google />
```

### Method 2 

This method suppose the Tracking ID is defined in the `symfony_ux.yaml` configuration

```twig 
<twig:Ux:Analytics provider="google" />
```

### Method 3

This method passe the tracking ID

```twig 
<twig:Ux:Analytics provider="google" trackingId="1234" />
```

### Twig component attributes

Attributes are `trackingId`, `trackingUrl`, `trackingDomain`