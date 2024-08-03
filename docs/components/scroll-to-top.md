# Scroll to top

Add a Scroll to top button.

## Configuration

```yaml
ux: 
    scroll_to_top: 
        top_at: 0
        toggle_at: 200
        symbol: "&&ShortUpArrow;;"
        title: "Go to to"
```

- `top_at` (`integer`) : Specifies the position of the top of the page.
    - Default : 0
    - Example : 0
- `toggle_at` (`integer`) : Specifies the position of the button's display or hiding point on the page.
    - Default : 200
    - Example : 200
- `symbol` (`string`) : Specifies the symbol of the button.
    - Default : "&ShortUpArrow;"
    - Example : "&ShortUpArrow;"
- `title` (`string`) : Specifies the title attribute value.
    - Default : "Go to top"
    - Example : "Go to top"
<br>

## How to use

### Basic usage

```twig 
<twig:ScrollToTop />
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

### Overriding configuration attributes

```twig 
<twig:ScrollToTop toggleAt="380" title="Top" />
```

The replaceable configuration attributes are :

- topAt
- toggleAt
- symbol
- title