# Prefix

We use a prefix to avoid naming conflicts and clarify the origin of elements in the code.

## Default prefix

The default prefix is `ux`.  
The prefix will be applied to components such as `ux-component`.  

```yaml 
symfony_ux:
    prefix: "ux"
```

## Customize the prefix

The prefix can be customized from the `symfony_ux.yaml`configuration file only.

```yaml 
symfony_ux:
    prefix: "my-custom-prefix"
```

If your custom prefix is `my-custom-prefix`.  
the prefix will be applied to components such as `.my-custom-prefix-accordion{}`.  

> Don't forget to run the command `php bin/console ux:build` to apply changes.


## Remove the prefix

Just set an empty string to remove the prefix.

```yaml 
symfony_ux:
    prefix: ''
```

> Don't forget to run the command `php bin/console ux:build` to apply changes.