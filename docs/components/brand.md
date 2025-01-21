# Brand



## What is it about ?

Create a responsive brand component.



## Integration

<!-- tabs:start -->
### **HTML**

```twig
<div class="ux-brand ux-brand-medium">
    <a class="ux-brand-link" href="#" target="_self">
        <div class="ux-brand-inner">
            <img class="ux-brand-logo ux-brand-logo-laptop" src="/build/images/logo-small.png" alt="My Brand">
            <img class="ux-brand-logo ux-brand-logo-desktop" src="/build/images/logo-medium.png" alt="My Brand">
            <p class="ux-brand-tagline" translate="no">My Brand Tagline</p>
        </div>
    </a>
</div>
``` 

### **Twig**

```twig
<twig:Component:Brand />
``` 

### **SCSS**

Import the builder `_brand.scss`

```css 
@use './../../../vendor/osw3/symfony-ux/assets/sass/builders/brand';
```
<!-- tabs:end -->



## Configuration

<!-- tabs:start -->
### **YAML**

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `size` | `enum` | Set the the size of the component  `small`, `medium`, `large`  | no | `medium` |
| `name` | `string` | Set the company/brand name. also used to ste `alt` attributes | no |  |
| `tagline` | `string` | Set the company/brand tagline | no |  |
| `logo` | `array` | Define a set of images (`breakpoint`: `image.png`)| no |  |
| `url` | `string` | Set the URL of the link | no |  |
| `route` | `string` | Set the route of the link (generate url), overload the URL | no |  |

```yaml
symfony_ux:
    components:
        brand:
            size: medium
            name: My Brand
            tagline: My Brand Tagline
            logo:
                phone: images/logo-small.png
                tablet: images/logo-medium.png
                desktop: images/logo-large.png
            route: app_homepage
            url: "#"
```

### **Twig**

### Twig configuration

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `name` | `string` | Set the company/brand name. also used to ste `alt` attributes | no |  |
| `tagline` | `string` | Set the company/brand tagline | no |  |
| `logo` | `array` | Define a set of images (`breakpoint`: `image.png`)| no |  |
| `url` | `string` | Set the URL of the link | no |  |
| `route` | `string` | Set the route of the link (generate url), overload the URL | no |  |

> Note: Parameters with • override the YAML configuration.

```twig 
{% set logo = {
    'laptop': asset("build/images/logo-small.png"),
    'desktop': asset("build/images/logo-medium.png"),
} %}
<twig:Component:Brand 
    name="My awesome brand" 
    tagline="This brand is awesome" 
    route="app_homepage" 
    :logo="logo"
/>
```
<!-- tabs:end -->



## Customize SCSS

<!-- tabs:start -->

### **Theme**

```css 
@use './../../../../bundle/assets/sass/storages/prefix';

$props: map.merge($props, (
    example-color: var(--#{prefix.$prefix}dark),
    example-hover-color: inherit,
));
```

### **Layout**

#### Custom file example

```css 
@use './../../../vendor/osw3/symfony-ux/assets/sass/storage/brand';

@include brand.setBreakpoints((laptop, desktop));
@include brand.setUselessBreakpoints(xxx);
@include brand.setPaddingX(xxx);
@include brand.setPaddingY(xxx);
@include brand.setPrimaryFontFamily(xxx);
@include brand.setPrimaryFontSize(xxx);
@include brand.setPrimaryFontWeight(xxx);
@include brand.setSecondaryFontFamily(xxx);
@include brand.setSecondaryFontSize(xxx);
@include brand.setSecondaryFontWeight(xxx);
@include brand.setTransition(xxx);
@include brand.setTransitionDelay(xxx);
@include brand.setTransitionType(xxx);
@include brand.setTaglineOffset(xxx);
```

<hr>

#### Available mixins

##### `setBreakpoints`

Redefine available breakpoints name for the Brand Component.

```css 
@include brand.setBreakpoints( list );
```

##### `setUselessBreakpoints`

exclude some breakpoints.

```css 
@include brand.setUselessBreakpoints( list );
```

##### `setPaddingX`

```css 
@include brand.setPaddingX( string );
```

##### `setPaddingY`

```css 
@include brand.setPaddingY( string );
```

##### `setPrimaryFontFamily` & `setSecondaryFontFamily`

```css 
@include brand.setPrimaryFontFamily( string );
@include brand.setSecondaryFontFamily( string );
```

##### `setPrimaryFontSize` & `setSecondaryFontSize`

```css 
@include brand.setPrimaryFontSize( string );
@include brand.setSecondaryFontSize( string );
```

##### `setPrimaryFontWeight` & `setSecondaryFontWeight`

```css 
@include brand.setPrimaryFontWeight( number );
@include brand.setSecondaryFontWeight( number );
```

##### `setTransition`

```css 
@include brand.setTransition( boolean );
```

##### `setTransitionDelay`

```css 
@include brand.setTransitionDelay( string );
```

##### `setTransitionType`

```css 
@include brand.setTransitionType( string );
```

##### `setTaglineOffset`

```css 
@include brand.setTaglineOffset( string );
```
<!-- tabs:end -->
