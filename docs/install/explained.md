# Install (process explained)

<br>

## Step 1 - Download with composer

### Step 1.a - Download the Bundle

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
composer require osw3/symfony-ux
```
<br>

### Step 1.b - Edit the line `"osw3/symfony-search"` of `composer.json` (optional)

Edit the line `"osw3/symfony-ux"` on your `composer.json`

```json 
{
    "require": {
        "osw3/symfony-ux": "*",
    },
}
```

<br>

## Step 2 - Enable the Bundle

Then, enable the bundle by adding it to the list of registered bundles
in the `config/bundles.php` file of your project:

```php 
// config/bundles.php

return [
    // ...
    OSW3\UX\UXBundle::class => ['all' => true],
];
```

<br>