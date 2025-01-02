# How to integrate Symfony UX (JS)

## Method 1 - Import all Symfony UX

Import the `symfony-ux-bundle` to your javascript file

```javascript
import '<path-to-your-vendor>/osw3/symfony-ux/dist/js/symfony-ux-bundle';
```

## Method 2 - Import Symfony UX component one by one according to your need

Import the `symfony-ux-bundle` to your javascript file.  
See each component's documentation for variable and builder dependencies.

```javascript
import ComponentName from '<path-to-your-vendor>/osw3/symfony-ux/assets/scripts/components/<component>';
```
