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

### Use the builder for button component

```scss 
@use './../../../vendor/osw3/symfony-ux/assets/sass/builders/brand';
```

### [optional] Customize the button component layout

- `setBreakpoints`  
Redefine available breakpoints name for the Brand Component
```scss 
@include brand.setBreakpoints((laptop, desktop));
```

- `setUselessBreakpoints`  
Or exclude some breakpoints
```scss 
@include brand.setUselessBreakpoints(( wide, ultra, ultra-wid ));
```

- `setPaddingX`  
```scss 
@include brand.setPaddingX(spaces.$base * .6);
```

- `setPaddingY`  
```scss 
@include brand.setPaddingY(spaces.$base * .8);
```

- `setPrimaryFontFamily` & `setSecondaryFontFamily`  
```scss 
@include brand.setPrimaryFontFamily(var(--#{prefix.$prefix}font-open-sans));
@include brand.setSecondaryFontFamily(var(--#{prefix.$prefix}font-open-sans));
```

- `setPrimaryFontSize` & `setSecondaryFontSize`  
```scss 
@include brand.setPrimaryFontSize(fonts.$base-font-size * 1.5);
@include brand.setSecondaryFontSize(fonts.$base-font-size * 1.5);
```

- `setPrimaryFontWeight` & `setSecondaryFontWeight`  
```scss 
@include brand.setPrimaryFontWeight(100 * 6);
@include brand.setSecondaryFontWeight(100 * 6);
```

- `setTransition`  
```scss 
@include brand.setTransition(false);
```

- `setTransitionDelay`  
```scss 
@include brand.setTransitionDelay(var(--#{prefix.$prefix}transition-normal));
```

- `setTransitionType`  
```scss 
@include brand.setTransitionType(ease-in-out);
```

- `setTaglineOffset`  
```scss 
@include brand.setTaglineOffset((spaces.$base * .5) * -1);
```

<!-- tabs:end -->
