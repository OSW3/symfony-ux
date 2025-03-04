# Announcement



## What is it about ?

Create an announcement bar.



## Code example

<!-- tabs:start -->
### **YAML**
```yaml
# config/packages/symfony_ux.yaml
symfony_ux:
    components:
        announcement:
            animated: always
            animation: ticker
            speed: 5
            entity: App\Entity\Announcement
```

### **HTML**

#### Example 1

```html
<div class="ui-announcement">
    <div class="ui-ticker" rel="js-ui-ticker" data-speed="15" data-delay="0" data-direction="rtl" data-loop="true" data-pauseHover="true">
        <div class="ui-ticker-item">Message...</div>
        <div class="ui-ticker-item">Message...</div>
        <div class="ui-ticker-item">Message...</div>
    </div>
</div>
``` 

#### Example 2

```html
<div class="{{ classname('announcement') }}">
    <div class="{{ classname('ticker') }}" rel="js-ui-ticker" data-speed="15" data-delay="0" data-direction="rtl" data-loop="true" data-pauseHover="true">
        <div class="{{ classname('ticker-item') }}">Message...</div>
        <div class="{{ classname('ticker-item') }}">Message...</div>
        <div class="{{ classname('ticker-item') }}">Message...</div>
    </div>
</div>
``` 

### **Twig**

#### Example 1

Messages stored in a twig variable.

```twig 
{% set messages = [
    "Message 1",
    "Message 2",
    "Message 3"
] %}
<twig:Component:Announcement 
    :messages="messages" 
    animation="ticker" 
/>
```

#### Example 2

Messages stored in a database.

```twig 
<twig:Component:Announcement 
    :messages="getAnnouncementMessages()" 
    animation="ticker" 
/>
```

### **SCSS**

#### Customize layout example

```css 
/* assets/sass/components/_announcement_.scss */
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storage/announcement';
@include announcement.setMinHeight(48px);
// ...
```

#### Customize theme example

```css 
/* assets/sass/themes/_light.scss */
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storages/themes';
@use '<vendor-path>/osw3/symfony-ux/assets/sass/storages/prefix';
@include themes.add('light', (
    'announcement--color': var(--#{$prefix}black),
    // ...
));
```

#### Import the component builder

```css 
/* assets/sass/ui.scss */
@use '<vendor-path>/osw3/symfony-ux/assets/sass/builders/announcement';
```

### **JavaScript**

```js
import '<vendor-path>/osw3/symfony-ux/assets/scripts/components/AnnouncementComponent';
```
<!-- tabs:end -->



## API

<!-- tabs:start -->
### **YAML**

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|:-|
| `animated` | `enum` | no | `always` | Define if the announcement as animation  `always`, `none`  |
| `animation` | `enum` | no | `ticker` | Set the animation type `ticker`,`rotator`,`none` |
| `speed` | `integer` | no | `6` | Set the animation speed `0` to `9` |
| `entity` | `string` | no | `null` | Define the entity of messages storage |


### **Twig**
> Note: Parameters with • override the YAML configuration.

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|:-|
| `messages` | `array` | no | [] | List of messages |
| `animation•` | `enum` | no | `ticker` | Set the animation type `ticker`,`rotator`,`none` |
| `pauseHover` | `boolean` | no | `true` | Set pause hover to the ticker or rotator |


### **SASS Layout**

#### `setMinHeight`
Sets the min height of the component

```css 
@include announcement.setMinHeight( {Length} $height  );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `height` | `Length` | yes | xxx | xxx |
<hr>

#### `setBorderWidth`
xxxx

```css 
@include announcement.setBorderWidth( {Length} $width  );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `height` | `Length` | yes | xxx | xxx |
<hr>

#### `setBorderRadius`
xxxx

```css 
@include announcement.setBorderRadius( {Length} $radius  );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `height` | `Length` | yes | xxx | xxx |
<hr>

#### `setHover`
xxxx

```css 
@include announcement.setHover( {Boolean} $enabled  );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `height` | `Length` | yes | xxx | xxx |
<hr>

#### `setTransition`
xxxx

```css 
@include announcement.setTransition( {Boolean} $enabled  );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `height` | `Length` | yes | xxx | xxx |
<hr>

#### `setTransitionDelay`
xxxx

```css 
@include announcement.setTransitionDelay( {String} $delay  );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `height` | `Length` | yes | xxx | xxx |
<hr>

#### `setTransitionType`
xxxx

```css 
@include announcement.setTransitionType( {String} $type  );
```

| Parameter | Type | Required | Default | Description |
|-|:-:|:-:|:-:|-|
| `height` | `Length` | yes | xxx | xxx |


### **SASS Theme**

#### `announcement--color`  
Defines the text color of the announcement. The default value is set to `var(--white)`, ensuring high readability.  
<hr>  

#### `announcement--color--hover`  
Specifies the text color of the announcement when hovered. The default value remains `var(--white)`, maintaining consistency.  
<hr>  

#### `announcement--bg-color`  
Sets the background color of the announcement. The default value is `var(--red)`, providing a strong visual impact.  
<hr>  

#### `announcement--bg-color--hover`  
Defines the background color of the announcement when hovered. The default value remains `var(--red)`, ensuring visual continuity.  
<hr>  

#### `announcement--border-color`  
Specifies the border color of the announcement. The default value is `null`, meaning no border is applied by default.  
<hr>  

#### `announcement--border-color--hover`  
Sets the border color of the announcement when hovered. The default value is `null`, indicating that no border change occurs on hover.  
<hr>  
<!-- tabs:end -->
