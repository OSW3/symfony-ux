<?php 
namespace OSW3\UX\Components;

use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use OSW3\UX\Components\AbstractComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@UxComponents/navigation/base.twig')]
final class Navigation extends AbstractComponent
{
    public const NAME = "navigation";
    
    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;
    
    #[ExposeInTemplate(name: 'wrapper', getter: 'fetchContainer')]
    public string $container;

    #[ExposeInTemplate(name: 'expandAt', getter: 'doNotExpose')]
    public string $expandAt = "laptop";

    #[ExposeInTemplate(name: 'type', getter: 'doNotExpose')]
    public string $type = "left";

    #[ExposeInTemplate(name: 'brand')]
    public array|null $brand;

    #[ExposeInTemplate(name: 'schema')]
    public array $schema;

    #[PreMount]
    public function preMount(array $data): array
    {
        // $options  = $this->getConfig();
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
            ->idResolver($resolver)
            ->classResolver($resolver)
            ->datasetResolver($resolver)
        ;

        $resolver->setDefault('container', "fluid");
        $resolver->setAllowedTypes('container', ['string']);

        $resolver->setDefault('expandAt', "laptop");
        $resolver->setAllowedTypes('expandAt', ['string']);

        $resolver->setDefault('type', "left");
        $resolver->setAllowedTypes('type', ['string']);
        $resolver->setAllowedValues('type', ['left', 'right', 'collapse']);

        $resolver->setDefault('brand', []);
        $resolver->setAllowedTypes('brand', ['array','null']);

        $resolver->setDefault('schema', []);
        $resolver->setAllowedTypes('schema', ['array']);


        return $resolver->resolve($data) + $data;
    }

    public function fetchId()
    {
        if (empty($this->id)) {
            $this->id = $this->getComponentClassname()."-".uniqid();
        }
        return $this->id;
    }

    public function fetchClass(): string
    {
        $classList = $this->classList();
        $classList[] = "{$this->prefix}navigation-{$this->type}";
        $classList[] = "{$this->prefix}expand-at-{$this->expandAt}";

        return implode(" ", $classList);
    }

    public function fetchContainer(): string
    {
        return trim($this->container);
    }
}