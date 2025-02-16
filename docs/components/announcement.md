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
@use './../../../vendor/osw3/symfony-ux/assets/sass/builders/announcement';
```

### **JavaScript**

Import the component `AnnouncementComponent`

```js
import './../../../vendor/osw3/symfony-ux/assets/scripts/components/AnnouncementComponent';
```
<!-- tabs:end -->



## Configuration

<!-- tabs:start -->
### **YAML**

| Parameter | Type | Description | Required | Default |
|-|-|-|-|-|
| `animated` | `enum` | Define if the announcement as animation  `always`, `none`  | no | `always` |
| `animation` | `enum` | Set the animation type `ticker`,`rotator`,`none` | no | `ticker` |
| `speed` | `integer` | Set the animation speed `0` to `9` | no | 6 |
| `entity` | `string` | Define the entity of messages storage | no | null |

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