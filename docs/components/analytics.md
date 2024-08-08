# Analytics

Add one or more analytics services.

## Configuration

```yaml
ux: 
    components: 
        analytics: 
            providerName:
                tracking_id: 1234
                tracking_url https://mysite.provider.url/
                tracking_domain mysite.com
```

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
<br>

## How to use

### Basic usage

```twig 
<twig:Analytics provider="google" />
```

```twig 
<twig:Analytics provider="google" trackingId="1234" />
```

```twig 
<twig:Analytics:Google trackingId="1234" />
```

```twig 
<twig:Analytics:Google trackingId="1234" />
```
<br>
