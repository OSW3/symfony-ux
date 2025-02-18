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
@use '<vendor-path>/osw3/symfony-ux/assets/sass/builders/brand';
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
@use './<path-to-vendor>/osw3/symfony-ux/assets/sass/storages/prefix';

$props: map.merge($props, (
    example-color: var(--#{$prefix}dark),
    example--color--hover: inherit,
));
```

### **Layout**

#### Custom file example

```css 
@use './<path-to-vendor>/osw3/symfony-ux/assets/sass/storage/brand';

@include brand.setBreakpoints((laptop, desktop));
@include brand.setUselessBreakpoints((laptop, desktop));
@include brand.setPaddingX(spaces.$base * .6);
@include brand.setPaddingY(spaces.$base * .8);
@include brand.setPrimaryFontFamily(null);
@include brand.setPrimaryFontSize(fonts.$scale-base * 1.5);
@include brand.setPrimaryFontWeight(100 * 6);
@include brand.setSecondaryFontFamily(null);
@include brand.setSecondaryFontSize(fonts.$scale-base * .8);
@include brand.setSecondaryFontWeight(100 * 4);
@include brand.setTransition(false);
@include brand.setTransitionDelay(var(--#{$prefix}transition-normal));
@include brand.setTransitionType(ease-in-out);
@include brand.setTaglineOffset((spaces.$base * .5) * -1);
```

<hr>

#### Available mixins

##### `setBreakpoints`

Sets the breakpoints for responsive design specific to the brand.

```css 
@include brand.setBreakpoints( {List} $breakpoints );
```

##### `setUselessBreakpoints`

Sets the breakpoints considered unnecessary for responsive design.

```css 
@include brand.setUselessBreakpoints( {List} $breakpoints  );
```

##### `setPaddingX`

Sets the horizontal padding for the brand's elements.

```css 
@include brand.setPaddingX( {Length} $padding  );
```

##### `setPaddingY`

Sets the vertical padding for the brand's elements.

```css 
@include brand.setPaddingY( {Length} $padding  );
```

##### `setPrimaryFontFamily` & `setSecondaryFontFamily`

Sets the primary or secondary font family for the brand. If null, defaults to the system or inherited font.

```css 
@include brand.setPrimaryFontFamily( {String|Null} $family );
@include brand.setSecondaryFontFamily( {String|Null} $family );
```

##### `setPrimaryFontSize` & `setSecondaryFontSize`

Sets the primary or secondary font size for the brand.

```css 
@include brand.setPrimaryFontSize( {Length} $size );
@include brand.setSecondaryFontSize( {Length} $size );
```

##### `setPrimaryFontWeight` & `setSecondaryFontWeight`

Sets the primary or secondary font weight for the brand.

```css 
@include brand.setPrimaryFontWeight( {Number} $weight );
@include brand.setSecondaryFontWeight( {Number} $weight );
```

##### `setTransition`

Enables or disables transitions for the brand's elements.

```css 
@include brand.setTransition( {Boolean} $enabled );
```

##### `setTransitionDelay`

Sets the transition delay for the brand's elements.

```css 
@include brand.setTransitionDelay( {Length} $delay );
```

##### `setTransitionType`

Sets the transition type (easing function) for the brand's elements.

```css 
@include brand.setTransitionType( {String} $type );
```

##### `setTaglineOffset`

Sets the offset for the brand's tagline, allowing for precise alignment.

```css 
@include brand.setTaglineOffset( {Length} $offset );
```
<!-- tabs:end -->
