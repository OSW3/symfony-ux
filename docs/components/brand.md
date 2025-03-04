# Brand



## What is it about ?

Create a responsive brand component.



## Code example

<!-- tabs:start -->
### **YAML**

```yaml
# config/packages/symfony_ux.yaml
symfony_ux:
    components:
        brand:
            direction: row
            justify: start
            tag: div
            size: medium
            name: My Brand
            tagline: My Brand Tagline
            hasHiddenText: false
            figures:
                phone: images/logo-small.png
                tablet: images/logo-medium.png
                desktop: images/logo-large.png
            route: app_homepage
            url: "#"
```

### **HTML**

#### Example 1

```html
<div class="ui-brand ui-brand-medium">
    <a class="ui-brand-link" href="#" target="_self">
        <div class="ui-brand-inner">
            <img class="ui-brand-logo ui-brand-logo-laptop" src="/build/images/logo-small.png" alt="My Brand">
            <img class="ui-brand-logo ui-brand-logo-desktop" src="/build/images/logo-medium.png" alt="My Brand">
            <p class="ui-brand-tagline" translate="no">My Brand Tagline</p>
        </div>
    </a>
</div>
``` 

#### Example 2

```twig
<div class="{{ classname('brand brand-medium') }}">
    <a class="{{ classname('brand-link') }}" href="#" target="_self">
        <div class="{{ classname('brand-inner') }}">
            <img class="{{ classname('brand-logo brand-logo-laptop') }}" src="{{ assets('/build/images/logo-small.png') }}" alt="My Brand">
            <img class="{{ classname('brand-logo brand-logo-desktop') }}" src="{{ assets('/build/images/logo-medium.png') }}" alt="My Brand">
            <p class="{{ classname('brand-tagline') }}" translate="no">My Brand Tagline</p>
        </div>
    </a>
</div>
``` 

### **Twig**

#### Example 1

```twig 
<twig:Component:Brand />
```
#### Example 2

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

### **SCSS**

#### Customize layout example

```css 
/* assets/sass/components/_brand.scss */
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storage/brand';
@include brand.setBreakpoints((laptop, desktop));
// ...
```

#### Customize theme example

```css 
/* assets/sass/themes/_light.scss */
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storages/themes';
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storages/prefix';
@include themes.add('light', (
    'brand--color': var(--#{$prefix}black),
    // ...
));
```

#### Import the component builder

```css 
/* assets/sass/ui.scss */
@use '<vendor-path>/osw3/symfony-ux/assets/sass/builders/brand';
```

### **JavaScript**

no javascript for this component.

<!-- tabs:end -->



## API

<!-- tabs:start -->
### **YAML**

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|:-|
| **`figures`** | `array` | no |  | Define a set of images (`breakpoint`: `image.png`)|
| **`name`** | `string` | no |  | Set the company/brand name. also used to ste `alt` attributes |
| **`route`** | `string` | no |  | Set the route of the link (generate url), overload the URL |
| **`size`** | `enum` | no | `medium` | Set the the size of the component  `small`, `medium`, `large`  |
| **`tag`** | `string` | no | `div` | Set the main HTML tag (e.g.: `h1`) |
| **`tagline`** | `string` | no |  | Set the company/brand tagline |
| **`url`** | `string` | no |  | Set the URL of the link |


### **Twig**
> Note: Parameters with • override the YAML configuration.

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|:-|
| **`figures`** | `array` | no |  | Define a set of images (`breakpoint`: `image.png`)|
| **`name`** | `string` | no |  | Set the company/brand name. also used to ste `alt` attributes |
| **`route`** | `string` | no |  | Set the route of the link (generate url), overload the URL |
| **`tag•`** | `string` | no | `div` | Set the main HTML tag (e.g.: `h1`) |
| **`tagline`** | `string` | no |  | Set the company/brand tagline |
| **`url`** | `string` | no |  | Set the URL of the link |


### **SASS Layout**


#### `setBreakpoints`
Sets the breakpoints for responsive design specific to the brand.

```css 
@include brand.setBreakpoints( {List} $breakpoints );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `breakpoints` | `List` | yes | xxx | xxx |
<hr>

#### `setUselessBreakpoints`
Sets the breakpoints considered unnecessary for responsive design.

```css 
@include brand.setUselessBreakpoints( {List} $breakpoints  );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `breakpoints` | `List` | yes | xxx | xxx |
<hr>

#### `setDirection`
Sets the flexbox or grid direction globally.

```css 
@include brand.setDirection( {String} $direction );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `direction` | `String` | yes | `row` | The desired flex or grid direction |
<hr>

#### `setJustify`
Sets the flexbox or grid direction globally.

```css 
@include brand.setJustify( {String} $justify );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `justify` | `String` | yes | `start` | The desired justification |
<hr>

#### `setGap`
Sets the flexbox or grid direction globally.

```css 
@include brand.setGap( {Length} $gap );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `gap` | `Length` | yes | `row` | The gap size |
<hr>

#### `setBorderWidth`
Sets the global border width for elements.

```css 
@include brand.setBorderWidth( {Length} $length );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `length` | `Length` | yes | `row` | The border width |
<hr>

#### `setBorderRadius`
Sets the global border radius for elements.

```css 
@include brand.setBorderRadius( {String} $length );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `length` | `String` | yes | `row` | The border radius |
<hr>

#### `setPaddingX`
Sets the horizontal padding for the brand's elements.

```css 
@include brand.setPaddingX( {Length} $padding  );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `padding` | `Length` | yes | xxx | xxx |
<hr>

#### `setPaddingY`
Sets the vertical padding for the brand's elements.

```css 
@include brand.setPaddingY( {Length} $padding  );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `padding` | `Length` | yes | xxx | xxx |
<hr>

#### `setPrimaryFontFamily` & `setSecondaryFontFamily`
Sets the primary or secondary font family for the brand. If null, defaults to the system or inherited font.

```css 
@include brand.setPrimaryFontFamily( {String|Null} $family );
@include brand.setSecondaryFontFamily( {String|Null} $family );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `family` | `String|Null` | no | null | xxx |
<hr>

#### `setPrimaryFontSize` & `setSecondaryFontSize`
Sets the primary or secondary font size for the brand.

```css 
@include brand.setPrimaryFontSize( {Length} $size );
@include brand.setSecondaryFontSize( {Length} $size );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `size` | `Length` | yes | xxx | xxx |
<hr>

#### `setPrimaryFontWeight` & `setSecondaryFontWeight`
Sets the primary or secondary font weight for the brand.

```css 
@include brand.setPrimaryFontWeight( {Number} $weight );
@include brand.setSecondaryFontWeight( {Number} $weight );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `weight` | `Number` | yes | xxx | xxx |
<hr>

#### `setTransition`
Enables or disables transitions for the brand's elements.

```css 
@include brand.setTransition( {Boolean} $enabled );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `enabled` | `Boolean` | yes | xxx | xxx |
<hr>

#### `setTransitionDelay`
Sets the transition delay for the brand's elements.

```css 
@include brand.setTransitionDelay( {Length} $delay );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `weidelayght` | `Length` | yes | xxx | xxx |
<hr>

#### `setTransitionType`
Sets the transition type (easing function) for the brand's elements.

```css 
@include brand.setTransitionType( {String} $type );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `type` | `String` | yes | xxx | xxx |
<hr>

#### `setTaglineOffset`
Sets the offset for the brand's tagline, allowing for precise alignment.

```css 
@include brand.setTaglineOffset( {Length} $offset );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `offset` | `Length` | yes | xxx | xxx |
<hr>


### **SASS Theme**

#### `brand--color`  
Defines the primary color of the brand. The default value is set to `var(--#{$prefix}gray-800)`, ensuring strong brand recognition and readability.  
<hr>

#### `brand--color--hover`  
Specifies the brand's color when hovered. The default value is `var(--#{$prefix}blue)`, providing a visual cue for interactivity.  
<hr>

#### `brand--bg-color`  
Sets the background color of the brand. By default, it is `transparent`, allowing flexibility in design and blending with various backgrounds.  
<hr>

#### `brand--bg-color--hover`  
Defines the background color of the brand on hover. The default remains `transparent`, ensuring a clean and minimal design.  
<hr>

#### `brand--border-color`  
Determines the default border color of the brand. The value `var(--#{$prefix}gray-200)` provides a subtle but visible outline.  
<hr>

#### `brand--border-color--hover`  
Sets the border color when the brand is hovered. The default `var(--#{$prefix}gray-500)` creates a stronger contrast to indicate interactivity.  
<!-- tabs:end -->
