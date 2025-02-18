# Menu



## What is it about ?

Create a simple menu.



## Integration

<!-- tabs:start -->
### **HTML**

```twig
 <nav class="ux-menu">
    <ul class="ux-menu-items">
        <li class="ux-menu-item"><a class="ux-menu-link" href="#">Home</a></li>
        <li class="ux-menu-item"><a class="ux-menu-link" href="#">New</a></li>
        <li class="ux-menu-item"><a class="ux-menu-link" href="#">Contact</a></li>
        <li class="ux-menu-item"><a class="ux-menu-link" href="#">About</a></li>
    </ul>
</nav>
``` 

### **Twig**

```twig
<twig:Component:Example />
``` 

### **SCSS**

Import the builder `_menu.scss`

```css 
@use '<vendor-path>/osw3/symfony-ux/assets/sass/builders/menu';
```

### **JavaScript**

Import the component `ExampleComponent`

```js
import '<vendor-path>/osw3/symfony-ux/assets/scripts/components/ExampleComponent';
```
<!-- tabs:end -->
