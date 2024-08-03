# Link

A advanced link.

## How to use

### Basic usage

```twig 
<twig:Link label="My link" url="https://github.com/osw3/symfony-ux" target="_blank" />
```
<br>

### Attributes

- `label`.

    Text between "a" tag.

    ```twig 
    <twig:Link label="..." />
    ```

- `url`.

    The destination of the link.
    
    ```twig 
    <twig:Link url="..." />
    ```

- `target`.

    The value of the target attribute.

    Default: `_self`.
    if `_blank` or "custom", an external link symbol will be added
    
    ```twig 
    <twig:Link target="..." />
    ```

- `isDisabled`.

    Set the link disabled
    
    ```twig 
    <twig:Link :isDisabled="true" />
    ```
<br>

### Extra attributes usage

- Add your custom ID.
    ```twig 
    <twig:ScrollToTop id="my-custom-id" />
    ```

- Add your custom class.
    ```twig 
    <twig:ScrollToTop class="my-custom-class" />
    ```

- Add your custom data attributes.
    ```twig 
    {% set my_dataset = {extra: "Extra data value"} %}
    <twig:ScrollToTop :dataset="my_dataset" />
    ```
<br>