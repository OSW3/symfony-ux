<?php 
namespace OSW3\UX\Components\Component\Header;

use OSW3\UX\Components\Component;
use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeRelTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/header/nav.twig')]
final class Content extends Component {

    public const NAME = "header";
    
    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeRelTrait;
    use AttributeClassTrait;
    // use AttributeStyleTrait;
    // use AttributeDatasetTrait;
    
    #[ExposeInTemplate(name: 'backdrop')]
    public bool $backdrop;

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
    public function preMount(array $data): array
    {
        $options  = $this->getConfig();
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
            ->idResolver($resolver)
            ->classResolver($resolver)
            // ->datasetResolver($resolver)
        ;

        $resolver->setRequired('id');
        $resolver->setAllowedTypes('id', ['string']);

        $resolver->setDefault('backdrop', $options['backdrop']);
        $resolver->setAllowedTypes('backdrop', ['boolean']);

        $resolver->setDefault('schema', []);
        $resolver->setAllowedTypes('schema', ['array']);

        $resolver->setDefault('justify', "start");
        $resolver->setAllowedTypes('justify', ['string']);

        // $resolver->setDefault('closeButton', true);
        // $resolver->setAllowedTypes('closeButton', ['boolean']);

        // $resolver->setDefault('placement', $options['placement']);
        // $resolver->setAllowedTypes('placement', ['string']);
        // $resolver->setAllowedValues('placement', PlacementX::toArray());

        // $resolver->setDefault('open', $options['is_showed']);
        // $resolver->setAllowedTypes('open', ['boolean']);

        // $resolver->setDefault('width', null);
        // $resolver->setAllowedTypes('width', ['string','null']);




        // $resolver->setDefault('body', "");
        // $resolver->setAllowedTypes('body', ['string']);

        // $resolver->setDefault('bodyTemplate', "");
        // // $resolver->setDefault('headerTemplate', $options['body_template']);
        // $resolver->setAllowedTypes('bodyTemplate', ['string']);

        // $resolver->setDefault('bodyOptions', []);
        // $resolver->setAllowedTypes('bodyOptions', ['array']);



        return $resolver->resolve($data) + $data;
    }

    public function fetchClass(): string {
        // $classList = $this->classList();
        $classList = [];
        $classList[] = "{$this->getComponentClassname()}-nav";

        if ($this->backdrop === false) {
            $classList[] = "{$this->getComponentClassname()}-no-backdrop";
        }

        // if ($this->open === true) {
        //     $classList[] = 'open';
        // }

        return implode(" ", $classList);
    }
}