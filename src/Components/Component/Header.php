<?php 
namespace OSW3\UX\Components\Component;

use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use OSW3\UX\Components\Component;
use OSW3\UX\Trait\AttributeRelTrait;
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
    use AttributeRelTrait;
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
    
    #[ExposeInTemplate(name: 'container', getter: 'fetchContainer')]
    public string|null $container;

    /**
     * Defines the mobile placement of the component (left, right, top).
     * 
     * @var string
     */
    #[ExposeInTemplate(getter: 'fetchPlacement')]
    public string|null $placement;
    
    /**
     * Indicates whether the component should be sticky
     * 
     * @var bool
     */
    #[ExposeInTemplate(getter: 'doNotExpose')]
    public bool $sticky;
    
    /**
     * Defines the tag name of the component
     * 
     * @var string
     */
    #[ExposeInTemplate(name: 'tag', getter: 'fetchTag')]
    public string $tag;

    /**
     * Header schema
     * 
     * @var array
     */
    #[ExposeInTemplate(name: 'schema')]
    public array $schema;

    #[ExposeInTemplate(name: 'justify')]
    public string $justify;

    #[PreMount]
    public function preMount(array $data): array {
        $options  = $this->getConfig();
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

        $resolver->setDefault('placement', $options['placement']);
        $resolver->setAllowedTypes('placement', ['string', 'null']);
        $resolver->setAllowedValues('placement', [null, 'left', 'right', 'top']);

        $resolver->setDefault('sticky', $options['sticky']);
        $resolver->setAllowedTypes('sticky', ['boolean']);

        $resolver->setDefault('tag', "header");
        $resolver->setAllowedTypes('tag', ['string']);

        $resolver->setDefault('schema', []);
        $resolver->setAllowedTypes('schema', ['array']);

        $resolver->setDefault('justify', "start");
        $resolver->setAllowedTypes('justify', ['string']);

        return $resolver->resolve($data) + $data;
    }
    
    public function fetchBrand(): array {
        if ($this->brand === true) {
            return $this->config['components']['brand'];
        }
    
        return is_array($this->brand) ? $this->brand : [];
    }
    
    public function fetchId() {
        $this->id = empty($this->id) ? $this->defaultId : $this->id;
        return $this->id;
    }

    public function fetchClass(): string {
        $classList = $this->classList();
        
        $classList[] = "{$this->prefix}header-{$this->placement}";
        
        // $classList[] = "open";

        if ($this->sticky) {
            $classList[] = "{$this->prefix}header-sticky";
        }

        return implode(" ", $classList);
    }
    
    public function fetchContainer(): string {
        return trim($this->container);
    }

    public function fetchPlacement(): string|null {
        $options = $this->getConfig();
        return $this->placement === null 
            ? $options['placement'] 
            : trim($this->placement)
        ;
    }

    public function fetchTag(): string {
        return trim($this->tag);
    }
}