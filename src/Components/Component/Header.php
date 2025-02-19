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

#[AsTwigComponent(template: '@SymfonyUx/header/base.twig')]
final class Header extends Component
{
    /**
     * The base name of the component
     * 
     * @var string
     */
    public const NAME = "header";

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


    /**
     * Brand component settings
     * 
     * If NULL, try to get the YAML config
     * 
     * @var array|bool
     */
    #[ExposeInTemplate(name: 'brand', getter: 'fetchBrand')]
    public array|bool $brand;





    
    #[ExposeInTemplate(name: 'containerClass', getter: 'fetchContainer')]
    public string|null $container;

    // #[ExposeInTemplate(name: 'expandAt', getter: 'doNotExpose')]
    // public string $expandAt = "laptop";

    #[ExposeInTemplate(name: 'schema')]
    public array $schema;
    
    #[ExposeInTemplate(name: 'sticky', getter: 'doNotExpose')]
    public string $sticky;
    
    #[ExposeInTemplate(name: 'tag', getter: 'fetchTag')]
    public string $tag;





    #[ExposeInTemplate(name: 'mobileDisplay', getter: 'doNotExpose')]
    public string $mobileDisplay = "left";

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

        $resolver->setDefault('brand', true);
        $resolver->setAllowedTypes('brand', ['array', 'bool']);






        $resolver->setDefault('container', null);
        $resolver->setAllowedTypes('container', ['string','null']);

        // $resolver->setDefault('expandAt', "laptop");
        // $resolver->setAllowedTypes('expandAt', ['string']);

        $resolver->setDefault('schema', []);
        $resolver->setAllowedTypes('schema', ['array']);

        $resolver->setDefault('sticky', false);
        $resolver->setAllowedTypes('sticky', ['boolean']);

        $resolver->setDefault('tag', "header");
        $resolver->setAllowedTypes('tag', ['string']);





        $resolver->setDefault('mobileDisplay', "offcanvas-left");
        $resolver->setAllowedTypes('mobileDisplay', ['string']);
        $resolver->setAllowedValues('mobileDisplay', ['offcanvas-left', 'offcanvas-right', 'collapse-top']);


        return $resolver->resolve($data) + $data;
    }

    public function fetchBrand(): array {
        if ($this->brand === true) {
            return $this->config['components']['brand'];
        }
    
        return is_array($this->brand) ? $this->brand : [];
    }





    public function fetchClass(): string {
        $classList = $this->classList();
        $classList[] = "{$this->prefix}navigation-{$this->mobileDisplay}";
        // $classList[] = "{$this->prefix}expand-at-{$this->expandAt}";

        if ($this->sticky) {
            $classList[] = "{$this->prefix}navigation-sticky";
        }

        return implode(" ", $classList);
    }

    public function fetchContainer(): string {
        $container = trim($this->container);
        return "container" . (!empty($container) ? "-{$container}" : "");
    }
    
    public function fetchId() {
        $this->id = empty($this->id) ? $this->defaultId : $this->id;
        return $this->id;
    }

    public function fetchTag(): string {
        return trim($this->tag);
    }
}