<?php 
namespace OSW3\UX\Components\Component;

use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use OSW3\UX\Components\Component;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/navigation/base.twig')]
final class Navigation extends Component
{
    /**
     * The base name of the component
     * 
     * @var string
     */
    public const NAME = "navigation";

    /**
     * The default component ID
     * 
     * @var string
     */
    private string $defaultId;
    
    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;

    #[ExposeInTemplate(name: 'brand', getter: 'fetchBrand')]
    public array|null $brand;
    
    #[ExposeInTemplate(name: 'wrapper', getter: 'fetchContainer')]
    public string $container;

    // #[ExposeInTemplate(name: 'expandAt', getter: 'doNotExpose')]
    // public string $expandAt = "laptop";

    #[ExposeInTemplate(name: 'schema')]
    public array $schema;
    
    #[ExposeInTemplate(name: 'sticky', getter: 'doNotExpose')]
    public string $sticky;
    
    #[ExposeInTemplate(name: 'tag', getter: 'fetchTag')]
    public string $tag;





    #[ExposeInTemplate(name: 'type', getter: 'doNotExpose')]
    public string $type = "left";

    #[PreMount]
    public function preMount(array $data): array {
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this->defaultId = "_".uniqid();

        $this
            ->idResolver($resolver)
            ->classResolver($resolver)
            ->datasetResolver($resolver)
        ;

        $resolver->setDefault('brand', []);
        $resolver->setAllowedTypes('brand', ['array','null']);

        $resolver->setDefault('container', "fluid");
        $resolver->setAllowedTypes('container', ['string']);

        // $resolver->setDefault('expandAt', "laptop");
        // $resolver->setAllowedTypes('expandAt', ['string']);

        $resolver->setDefault('schema', []);
        $resolver->setAllowedTypes('schema', ['array']);

        $resolver->setDefault('sticky', false);
        $resolver->setAllowedTypes('sticky', ['boolean']);

        $resolver->setDefault('tag', "header");
        $resolver->setAllowedTypes('tag', ['string']);





        $resolver->setDefault('type', "left");
        $resolver->setAllowedTypes('type', ['string']);
        $resolver->setAllowedValues('type', ['left', 'right', 'collapse']);


        return $resolver->resolve($data) + $data;
    }

    public function fetchBrand(): array {
        return !empty($this->brand) 
            ? $this->brand
            : $this->config['components']['brand']
        ;
    }

    public function fetchClass(): string {
        $classList = $this->classList();
        $classList[] = "{$this->prefix}navigation-{$this->type}";
        // $classList[] = "{$this->prefix}expand-at-{$this->expandAt}";

        if ($this->sticky) {
            $classList[] = "{$this->prefix}navigation-sticky";
        }

        return implode(" ", $classList);
    }

    public function fetchContainer(): string {
        return trim($this->container);
    }

    public function fetchId() {
        $this->id = empty($this->id) ? $this->defaultId : $this->id;
        return $this->id;
    }

    public function fetchTag(): string {
        return trim($this->tag);
    }
}