# Example Component



## What is it about ?

The Analytics feature allows you to integrate various analytics services into your application.  
This enables you to track user behavior, interactions, and other key metrics across your site.  
You can configure multiple providers like Google Analytics, Clicky, Heap, and others.

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



## Code example

<!-- tabs:start -->
### **YAML**

```yaml
symfony_ux:
    components:
        analytics: 
            google: # replace by the name of the provider
                tracking_id: 1234
                tracking_url: https://mysite.provider.url/
                tracking_domain: mysite.com
```

### **Twig**

#### Example 1

```twig
<twig:Component:Analytics:Google />
``` 

#### Example 2

```twig 
<twig:Component:Analytics provider="google" trackingId="1234" />
```
<!-- tabs:end -->


## API

<!-- tabs:start -->
### **YAML**

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `tracking_id` | `int|string` | no |  | Set the tracking ID. |
| `tracking_url` | `string` | no |  | Set the tracking URL. |
| `tracking_domain` | `string` | no |  | Set the tracking domain. |

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

### **Twig**
> Note: Parameters with • override the YAML configuration.

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `tracking_id•` | `int|string` | no |  | Set the tracking ID. |
| `tracking_url•` | `string` | no |  | Set the tracking URL. |
| `tracking_domain•` | `string` | no |  | Set the tracking domain. |

<!-- tabs:end -->
