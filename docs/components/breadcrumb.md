# Breadcrumb



## What is it about ?

Make a Breadcrumb.



## Integration

<!-- tabs:start -->
### **HTML**

```twig
<nav class="ui-breadcrumb">
    <ul>
        <li><a href="#">Accueil</a></li>
        <li><a href="#">Catégorie</a></li>
        <li><a href="#">Sous-catégorie</a></li>
        <li class="active">Produit</li>
    </ul>
</nav>
``` 

### **Twig**

```twig
<twig:Component:Breadcrumb :items="[]"/>
``` 

### **SCSS**

```css 
@use '<vendor-path>/osw3/symfony-ux/assets/sass/builders/breadcrumb';
```
<!-- tabs:end -->



## Configuration

<!-- tabs:start -->
### **YAML**

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `separator` | `string` | Symbol used as a separator in the breadcrumb navigation. | no | `›` |
| `home.label` | `string` | Label displayed for the home link in the breadcrumb. | no | `'null'` |
| `home.icon` | `string` | Icon associated with the home link, typically in the format `symbol:home`. | no | `null` |
| `home.url` | `string` | URL for the home link. | no | `"#"` |
| `home.route` | `string` | Route name for the home link. | no | `null`|

```yaml
symfony_ux:
    components:
        breadcrumb:
            separator: "›"
            home:
                label: 'Home'
                icon: symbol:home
                url: "#"
                route: app_homepage
```

### **Twig**

### Twig configuration

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `items` | `array` | List of breadcrumb items. Each item should contain a `label` and either a `route` or `url`. | yes |  |

> Note: Parameters with • override the YAML configuration.

```twig 
{% set items = [
    {
        label: "Category",
        route: "app_category",
    },
    {
        label: "Sub Category",
        route: "app_sub_category",
    },
    {
        label: "Product",
        url: "#"
    },
] %}
<twig:Component:Breadcrumb :items="items"/>
```
<!-- tabs:end -->




## Customize SCSS

<!-- tabs:start -->

### **Theme**

```css 
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storages/prefix';

$props: map.merge($props, (
    'breadcrumb-separator--color': var(--#{$prefix}gray-600),
    'breadcrumb--color'          : var(--#{$prefix}gray-600),
    'breadcrumb--color--hover'   : var(--#{$prefix}gray-900),
    'breadcrumb--color--active'  : var(--#{$prefix}black),
));
```

### **Layout**

#### Custom file example

```css 
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storage/breadcrumb';

@include breadcrumb.setSeparatorSymbol(›);
@include breadcrumb.setTransition(true);
@include breadcrumb.setTransitionDelay(var(--#{$prefix}transition-normal));
@include breadcrumb.setTransitionType(ease-in-out);
```

<hr>

#### Available mixins

##### `setSeparatorSymbol`

Sets the symbol used as a separator in breadcrumbs or similar UI elements.

```scss
@include breadcrumb.setSeparatorSymbol({String} $symbol)
```

##### `setTransition`

Enables or disables transitions for the brand's elements.

```scss
@include breadcrumb.setTransition({Boolean} $enabled)
```

##### `setTransitionDelay`

Sets the transition delay for the brand's elements.

```scss
@include breadcrumb.setTransitionDelay({Length} $delay)
```

##### `setTransitionType`

Sets the transition type (easing function) for the brand's elements.

```scss
@include breadcrumb.setTransitionType({String} $type)
```
<!-- tabs:end -->
