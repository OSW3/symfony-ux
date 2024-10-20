# Analytics

## What is it about ?

The Analytics feature allows you to integrate various analytics services into your application.  
This enables you to track user behavior, interactions, and other key metrics across your site.  
You can configure multiple providers like Google Analytics, Clicky, Heap, and others.

<!-- {"file": "main.html", "language": "twig", "render": false} -->

## Integration

### Supported services

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

### Twig integration

#### Method 1: Using Predefined Tracking ID

This method assumes that the Google Analytics Tracking ID is already configured in the `symfony_ux.yaml` file. In this case, you simply need to add the following Twig code to integrate Google Analytics:

```twig
<twig:Ux:Analytics:Google />
```

#### Method 2: Specifying the Provider

This method is ideal if you are using multiple analytics providers, and their Tracking IDs are defined in the `symfony_ux.yaml` configuration file. You simply specify the provider in the template, and the corresponding Tracking ID will be used:
```twig
<twig:Ux:Analytics provider="google" />
<twig:Ux:Analytics provider="matomo" />
```

#### Method 3: Passing the Tracking ID Directly

In situations where you need to specify the Tracking ID directly in the template (bypassing the configuration file), use this approach:

```twig
<twig:Ux:Analytics provider="google" trackingId="1234" />
```

## Configuration

### Configuration YAML

The YAML configuration allows you to define default parameters for all xxxxxx components.  
These can be overridden on a per-component basis when using the Twig integration.

```yaml
ux: 
    components: 
        analytics: 
            <provider>: # replace by the name of the provider
                tracking_id: 1234
                tracking_url: https://mysite.provider.url/
                tracking_domain: mysite.com
```

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `tracking_id` | `int|string` | Set the tracking ID. | no |  |
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
