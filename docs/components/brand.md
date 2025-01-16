# Brand

## What is it about ?

Create a responsive brand component.

## Integration

```twig
<twig:Ux:Brand />
``` 

## Configuration

<!-- tabs:start -->
### **YAML**

```yaml
symfony_ux:
    components:
        brand:
            size: medium
            name: My Company
            tagline: My tagline
            logo:
                phone: images/logo-small.png
                tablet: images/logo-medium.png
                desktop: images/logo-large.png
            # route: app_homepage
            url: https://netlab.osw3.net
```

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `size` | `enum` | Set the the size of the component  `small`, `medium`, `large`  | no | `medium` |
| `name` | `string` | Set the company/brand name. also used to ste `alt` attributes | no |  |
| `tagline` | `string` | Set the company/brand tagline | no |  |
| `logo` | `array` | Define a set of images ([`breakpoint`](./../layout/breakpoints.md): `image.png`)| no |  |
| `url` | `string` | Set the URL of the link | no |  |
| `route` | `string` | Set the route of the link (generate url), overload the URL | no |  |

### **Twig Components**

### Twig configuration

```twig 
{% set logo = {
    'laptop': asset("build/images/favicon.png"),
    'desktop': asset("build/images/logo-text.png"),
} %}
<twig:Ux:Brand 
    name="My awesome brand" 
    tagline="This brand is awesome" 
    route="app_homepage" 
    :logo="logo"
/>
```
| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `name` | `string` | Set the company/brand name. also used to ste `alt` attributes | no |  |
| `tagline` | `string` | Set the company/brand tagline | no |  |
| `logo` | `array` | Define a set of images ([`breakpoint`](./../layout/breakpoints.md): `image.png`)| no |  |
| `url` | `string` | Set the URL of the link | no |  |
| `route` | `string` | Set the route of the link (generate url), overload the URL | no |  |

### **SASS**

### [optional] Customize the button component layout

```scss 
@use './../../../vendor/osw3/symfony-ux/assets/sass/storages/prefix';
@use './../../../vendor/osw3/symfony-ux/assets/sass/storages/fonts';
@use './../../../vendor/osw3/symfony-ux/assets/sass/storages/spaces';
@use './../../../vendor/osw3/symfony-ux/assets/sass/storages/brand';

// Redefine available breakpoints name for the Brand Component
@include brand.breakpoints((laptop, desktop));

// Or exclude some breakpoints
@include brand.useless-breakpoints(( wide, ultra, ultra-wid ));

@include brand.padding-x(spaces.$base * .6);
@include brand.padding-y(spaces.$base * .8);
@include brand.primary-font-family(var(--#{prefix.$prefix}font-open-sans));
@include brand.primary-font-size(fonts.$base-font-size * 1.5);
@include brand.primary-font-weight(100 * 6);
@include brand.secondary-font-family(var(--#{prefix.$prefix}font-monospace));
@include brand.secondary-font-size(fonts.$base-font-size * .8);
@include brand.secondary-font-weight(100 * 4);
@include brand.tagline-offset((spaces.$base * .5) * -1);
@include brand.transition-delay(var(--#{prefix.$prefix}transition-normal));
@include brand.transition-type(ease-in-out);
```

### Use the builder for button component

```scss 
@use './../../../vendor/osw3/symfony-ux/assets/sass/builders/brand';
```

<!-- tabs:end -->
