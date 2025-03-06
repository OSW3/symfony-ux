# Rating



## What is it about ?

Create a rating stars component.



## Integration

<!-- tabs:start -->
### **HTML**

```twig
<div class="ux-rating ux-rating-medium" rel="js-ux-rating" data-rating-value="3.5" data-fetch-url="" data-fetch-params="{entity: 'book', id: 42}">
    <div class="ux-rating-selector">
        <input class="ux-rating-radio" type="radio" name="rating" id="rating-1" >
        <label class="ux-rating-item" for="rating-1" title="1"><span>1</span></label>
        <input class="ux-rating-radio" type="radio" name="rating" id="rating-2" >
        <label class="ux-rating-item" for="rating-2" title="2"><span>2</span></label>
        <input class="ux-rating-radio" type="radio" name="rating" id="rating-3" checked>
        <label class="ux-rating-item" for="rating-3" title="3"><span>3</span></label>
        <input class="ux-rating-radio" type="radio" name="rating" id="rating-4" >
        <label class="ux-rating-item" for="rating-4" title="4"><span>4</span></label>
        <input class="ux-rating-radio" type="radio" name="rating" id="rating-5" >
        <label class="ux-rating-item" for="rating-5" title="5"><span>5</span></label>
    </div>
    <div class="ux-rating-counter"></div>
    <div class="ux-rating-legend"></div>
</div>
``` 

### **Twig**

```twig
<twig:Component:Rating />
``` 

### **SCSS**

Import the builder `_example.scss`

```css 
@use '<vendor-path>/osw3/symfony-ux/assets/sass/builders/rating';
```

### **JavaScript**

Import the component `ExampleComponent`

```js
import '<vendor-path>/osw3/symfony-ux/assets/scripts/components/RatingComponent';
```
<!-- tabs:end -->



## Configuration

<!-- tabs:start -->
### **YAML**

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `ratingScale` | `integer` | Maximum rating value (e.g., 5 for a 5-star rating). | no | 5 |
| `length` | `integer` | Number of rating elements displayed (e.g., 5 stars).  | no | 5 |
| `tooltip` | `boolean` | Displays a tooltip showing the selected rating value on hover.  | no | true |
| `counter` | `boolean` | Displays a numeric counter for the selected rating.  | no | true |
| `legend` | `boolean` | Enables the display of labels below the rating elements.  | no | true |
| `size` | `string` | Component size (`small`, `medium`, `large`).	  | no | medium |
| `legends` | `array` | List of labels associated with rating values.	  | no | [] |

```yaml
symfony_ux:
    components:
        rating: 
            ratingScale: 5
            length     : 5
            tooltip    : true
            counter    : true
            legend     : true
            size       : medium
            legends: 
                - { value: 1, label: "Terrible"},
                - { value: 2, label: "Bad"},
                - { value: 3, label: "OK"},
                - { value: 4, label: "Good"},
                - { value: 5, label: "Excellent"}
```

### **Twig**

### Twig configuration

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `value` | `integer`,`float` | The current rating value (can be a whole number or a decimal). | no |  |
| `size •` | `string` | The size of the rating component (small, medium, large). | no |  |
| `ratingScale •` | `integer` | The maximum rating value (e.g., 5 for a 5-star rating, 10 for a 10-point scale). | no |  |
| `length •` | `integer` | The number of rating elements displayed (e.g., number of stars). | no |  |
| `counter •` | `boolean` | Displays a numeric counter for the selected rating. | no |  |
| `legend •` | `boolean` | Enables the display of labels below the rating elements. | no |  |
| `tooltip •` | `boolean`,`string` | Shows a tooltip with rating information.<br>Supports placeholders: %value% (the rating) and %legend% (the corresponding label from the legends array). | no |  |

> Note: Parameters with • override the YAML configuration.

```twig 
<twig:Component:Rating 
    value="3" 
    size="small"
    ratingScale="10" 
    length="10"
    tooltip="Rate %value% - %legend%"
/>
```
<!-- tabs:end -->




## Customize SCSS

<!-- tabs:start -->

### **Theme**

<!-- ```css 
@use './../../../../../../bundle/assets/sass/storages/prefix';

$props: map.merge($props, (
    example-color             : var(--#{$prefix}black),
    example--color--hover       : var(--#{$prefix}orange),
    example--bg-color          : var(--#{$prefix}yellow),
    example--bg-color--hover    : var(--#{$prefix}green),
    example--border-color      : var(--#{$prefix}gray-600),
    example--border-color--hover: var(--#{$prefix}gray-700),
));
``` -->

### **Layout**

#### Custom file example

<!-- ```css 
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storage/example';

@include example.setPadding(1rem);
@include example.setTransitionType(ease-in-out);
```

<hr>

#### Available mixins

##### `xxxx`

xxxx

```css 
@xxxx;
``` -->
<!-- tabs:end -->
