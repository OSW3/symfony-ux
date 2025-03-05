# Breadcrumb



## What is it about ?

Make a Breadcrumb.



## Code example

<!-- tabs:start -->
### **YAML**

```yaml
# config/packages/symfony_ux.yaml
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
      
### **HTML**

#### Example 1

```html
<nav class="ui-breadcrumb">
    <ul>
        <li><a href="#">Accueil</a></li>
        <li><a href="#">Catégorie</a></li>
        <li><a href="#">Sous-catégorie</a></li>
        <li class="active">Produit</li>
    </ul>
</nav>
``` 

#### Example 2

```twig
<nav class="{{ classname('breadcrumb') }}">
    <ul>
        <li><a href="#">Accueil</a></li>
        <li><a href="#">Catégorie</a></li>
        <li><a href="#">Sous-catégorie</a></li>
        <li class="active">Produit</li>
    </ul>
</nav>
``` 

### **Twig**

#### Example 1

Breadcrumb items stored in a twig variable.

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

### **SCSS**

#### Customize layout example

```css 
/* assets/sass/components/breadcrumb.scss */
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storage/breadcrumb';
@include announcement.setMinHeight(48px);
// ...
```

#### Customize theme example

```css 
/* assets/sass/themes/_light.scss */
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storages/themes';
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storages/prefix';
@include themes.add('light', (
    'breadcrumb--color': var(--#{$prefix}gray-600),
    // ...
));
```

#### Import the component builder

```css 
/* assets/sass/ui.scss */
@use '<vendor-path>/osw3/symfony-ux/assets/sass/builders/breadcrumb';
```
<!-- tabs:end -->



## API

<!-- tabs:start -->
### **YAML**

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|:-|
| `separator` | `string` | no | `›` | Symbol used as a separator in the breadcrumb navigation. |
| `home.label` | `string` | no | `'null'` | Label displayed for the home link in the breadcrumb. |
| `home.icon` | `string` | no | `null` | Icon associated with the home link, typically in the format `symbol:home`. |
| `home.url` | `string` | no | `"#"` | URL for the home link. |
| `home.route` | `string` | no | `null`| Route name for the home link. |


### **Twig**
> Note: Parameters with • override the YAML configuration.

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|:-|
| `items` | `array` | yes |  | List of breadcrumb items. Each item should contain a `label` and either a `route` or `url`. |

### **SASS Layout**

#### `setSeparatorSymbol`  
Sets the separator symbol for the breadcrumb component.  

```css
@include breadcrumb.setSeparatorSymbol( {String} $symbol );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|:-|
| `symbol` | `String` | yes | `›` | Defines the visual separator between breadcrumb items. |
<hr>  

#### `setTransition`  
Enables or disables the transition effect for breadcrumb items.  

```css
@include breadcrumb.setTransition( {Boolean} $enable );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|:-|
| `enable` | `Boolean` | yes | `true` | Enables (`true`) or disables (`false`) the breadcrumb transition effect. |
<hr>  

#### `setTransitionDelay`  
Specifies the delay before the breadcrumb transition starts.  

```css
@include breadcrumb.setTransitionDelay( {Time} $delay );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|:-|
| `delay` | `Time` | yes | `var(--transition-normal)` | Defines the delay duration before the transition begins. |
<hr>  

#### `setTransitionType`  
Defines the transition timing function for breadcrumb animations.  

```css
@include breadcrumb.setTransitionType( {String} $type );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|:-|
| `type` | `String` | yes | `ease-in-out` | Specifies the easing function for the breadcrumb transition. |
<hr>  

### **SASS Theme**

#### `breadcrumb-separator--color`  
Defines the color of the breadcrumb separator. The default value is set to `var(--gray-600)`, ensuring a subtle visual separation between breadcrumb items.  
<hr>  

#### `breadcrumb--color`  
Specifies the default text color of breadcrumb items. The default value is `var(--gray-600)`, providing a neutral and readable appearance.  
<hr>  

#### `breadcrumb--color--hover`  
Determines the text color of breadcrumb items when hovered. The default value is `var(--gray-900)`, enhancing contrast for better visibility on hover.  
<hr>  

#### `breadcrumb--color--active`  
Sets the text color of the active breadcrumb item. The default value is `var(--black)`, ensuring strong emphasis on the current page.  
<!-- tabs:end -->
