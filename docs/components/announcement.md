# Announcement



## What is it about ?

Create an announcement bar.



## Integration

<!-- tabs:start -->
### **Twig**

```twig
<twig:Component:Announcement />
``` 

### **HTML Structure**

```html
<div class="ui-announcement">
    <div class="ui-ticker" rel="js-ui-ticker" data-speed="15" data-delay="0" data-direction="rtl" data-loop="true" data-pauseHover="true">
        <div class="ui-ticker-item">Message.../div>
        <div class="ui-ticker-item">Message.../div>
        <div class="ui-ticker-item">Message.../div>
    </div>
</div>
``` 

### **SCSS**

```css 
@use '<vendor-path>/osw3/symfony-ux/assets/sass/builders/announcement';
```

### **JavaScript**

Import the component `AnnouncementComponent`

```js
import '<vendor-path>/osw3/symfony-ux/assets/scripts/components/AnnouncementComponent';
```
<!-- tabs:end -->



## Configuration

<!-- tabs:start -->
### **YAML**

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `animated` | `enum` | Define if the announcement as animation  `always`, `none`  | no | `always` |
| `animation` | `enum` | Set the animation type `ticker`,`rotator`,`none` | no | `ticker` |
| `speed` | `integer` | Set the animation speed `0` to `9` | no | `6` |
| `entity` | `string` | Define the entity of messages storage | no | `null` |

```yaml
symfony_ux:
    components:
        announcement:
            animated: always
            animation: ticker
            speed: 5
            entity: App\Entity\Announcement
```

### **Twig**

### Twig configuration

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `messages` | `array` | List of messages | no | [] |
| `animation` • | `enum` | Set the animation type `ticker`,`rotator`,`none` | no | `ticker` |
| `pauseHover` | `boolean` | Set pause hover to the ticker or rotator | no | `true` |

> Note: Parameters with • override the YAML configuration.

```twig 
{% set messages = [
    "Message 1",
    "Message 2",
    "Message 3"
] %}
<twig:Component:Brand 
    :messages="messages" 
    animation="ticker" 
/>
```
```twig 
<twig:Component:Brand 
    :messages="getAnnouncementMessages()" 
    animation="ticker" 
/>
```
<!-- tabs:end -->



## Customize SCSS

<!-- tabs:start -->

### **Theme**

```css 
@use './<path-to-vendor>/osw3/symfony-ux/assets/sass/storages/prefix';

$props: map.merge($props, (
    'announcement--color'              : var(--#{$prefix}white),
    'announcement--color--hover'       : var(--#{$prefix}white),
    'announcement--bg-color'           : var(--#{$prefix}red),
    'announcement--bg-color--hover'    : var(--#{$prefix}red),
    'announcement--border-color'       : null,
    'announcement--border-color--hover': null,
));
```

### **Layout**

#### Custom file example

```css 
@use './<path-to-vendor>/osw3/symfony-ux/assets/sass/storage/prefix';
@use './<path-to-vendor>/osw3/symfony-ux/assets/sass/storage/announcement';
$prefix: prefix.$prefix;

@include announcement.setMinHeight(48px);
@include announcement.setBorderWidth(0);
@include announcement.setBorderRadius(var(--#{$prefix}border-radius-none));
@include announcement.setHover(true);
@include announcement.setTransition(true);
@include announcement.setTransitionDelay(var(--#{$prefix}transition-normal));
@include announcement.setTransitionType(ease-in-out);
```

<hr>

#### Available mixins

##### `setMinHeight`

xxxx

```css 
@include announcement.setMinHeight( {Length} $height  );
```

##### `setBorderWidth`

xxxx

```css 
@include announcement.setBorderWidth( {Length} $width  );
```

##### `setBorderRadius`

xxxx

```css 
@include announcement.setBorderRadius( {Length} $radius  );
```

##### `setHover`

xxxx

```css 
@include announcement.setHover( {Boolean} $enabled  );
```

##### `setTransition`

xxxx

```css 
@include announcement.setTransition( {Boolean} $enabled  );
```

##### `setTransitionDelay`

xxxx

```css 
@include announcement.setTransitionDelay( {String} $delay  );
```

##### `setTransitionType`

xxxx

```css 
@include announcement.setTransitionType( {String} $type  );
```
<!-- tabs:end -->
