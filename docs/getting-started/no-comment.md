# Install (no-comment process)

Step by step. No comment.

<br>

## Step 1 - Download with composer

### Step 1.a - Download the Bundle

```shell 
composer require osw3/symfony-ux
```

<br>

### Step 1.b - Edit the line `"osw3/symfony-ux"` of `composer.json` (optional)

```json 
{
    "require": {
        "osw3/symfony-ux": "*",
    },
}
```

<br>

## Step 2 - Enable the Bundle

```php
// config/bundles.php

return [
    // ...
    OSW3\UX\UXBundle::class => ['all' => true],
];
```

<br>