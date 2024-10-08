<?php 
namespace OSW3\UX\Components\Ux;

use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeRelTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use OSW3\UX\Components\AbstractComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/modal/base.twig')]
final class Modal extends AbstractComponent
{
    public const NAME = "modal";
    
    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeRelTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;

    #[ExposeInTemplate(name: 'placement', getter: 'doNotExpose')]
    public string $placement;
    
    #[ExposeInTemplate(name: 'open', getter: 'doNotExpose')]
    public bool $open;
    
    #[ExposeInTemplate(name: 'backdrop')]
    public bool $backdrop;


    // Content Header 

    #[ExposeInTemplate(name: 'header', getter: 'fetchHeader')]
    public string $header;
    
    #[ExposeInTemplate(name: 'headerTemplate', getter: 'doNotExpose')]
    public ?string $headerTemplate;
    
    #[ExposeInTemplate(name: 'headerOptions', getter: 'doNotExpose')]
    public array $headerOptions;


    // Content Body 

    #[ExposeInTemplate(name: 'body', getter: 'fetchBody')]
    public string $body;
    
    #[ExposeInTemplate(name: 'bodyTemplate', getter: 'doNotExpose')]
    public ?string $bodyTemplate;
    
    #[ExposeInTemplate(name: 'bodyOptions', getter: 'doNotExpose')]
    public array $bodyOptions;


    // Content Footer

    #[ExposeInTemplate(name: 'footer', getter: 'fetchFooter')]
    public string $footer;
    
    #[ExposeInTemplate(name: 'footerTemplate', getter: 'doNotExpose')]
    public ?string $footerTemplate;
    
    #[ExposeInTemplate(name: 'footerOptions', getter: 'doNotExpose')]
    public array $footerOptions;

    #[PreMount]
    public function preMount(array $data): array
    {
        // $options  = $this->getConfig();
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
            ->classResolver($resolver)
            ->datasetResolver($resolver)
        ;

        $resolver->setRequired('id');
        $resolver->setAllowedTypes('id', ['string']);

        $resolver->setDefault('placement', 'centered');
        $resolver->setAllowedTypes('placement', ['string']);
        $resolver->setAllowedValues('placement', ['top-left', 'top-center', 'top-right', 'middle-left', 'middle-center', 'centered', 'middle-right', 'bottom-left', 'bottom-center', 'bottom-right']);

        $resolver->setDefault('open', false);
        $resolver->setAllowedTypes('open', ['boolean']);

        $resolver->setDefault('backdrop', true);
        $resolver->setAllowedTypes('backdrop', ['boolean']);


        $resolver->setDefault('header', "");
        $resolver->setAllowedTypes('header', ['string']);

        $resolver->setDefault('headerTemplate', "");
        // $resolver->setDefault('headerTemplate', $options['header_template']);
        $resolver->setAllowedTypes('headerTemplate', ['null','string']);

        $resolver->setDefault('headerOptions', []);
        $resolver->setAllowedTypes('headerOptions', ['array']);


        $resolver->setDefault('body', "");
        $resolver->setAllowedTypes('body', ['string']);

        $resolver->setDefault('bodyTemplate', "");
        // $resolver->setDefault('headerTemplate', $options['body_template']);
        $resolver->setAllowedTypes('bodyTemplate', ['null','string']);

        $resolver->setDefault('bodyOptions', []);
        $resolver->setAllowedTypes('bodyOptions', ['array']);


        $resolver->setDefault('footer', "");
        $resolver->setAllowedTypes('footer', ['string']);

        $resolver->setDefault('footerTemplate', "");
        // $resolver->setDefault('headerTemplate', $options['footer_template']);
        $resolver->setAllowedTypes('footerTemplate', ['null','string']);

        $resolver->setDefault('footerOptions', []);
        $resolver->setAllowedTypes('footerOptions', ['array']);

        return $resolver->resolve($data) + $data;
    }

    public function fetchClass(): string
    {
        $placement = $this->placement;

        if ($placement == 'centered') {
            $placement = "middle-center";
        }

        $classList = $this->classList();
        $classList[] = "{$this->getComponentClassname()}-{$placement}";

        if ($this->backdrop === false) {
            $classList[] = "{$this->getComponentClassname()}-no-backdrop";
        }

        if ($this->open === true) {
            $classList[] = 'open';
        }

        return implode(" ", $classList);
    }

    public function fetchHeader(): string
    {
        $content = $this->header;

        $this->headerOptions['id'] = $this->id;

        if (!empty($this->headerTemplate)) $content = $this->environment->render(
            $this->headerTemplate, 
            $this->headerOptions
        );

        return $content;
    }

    public function fetchBody(): string
    {
        $content = $this->body;

        $this->bodyOptions['id'] = $this->id;

        if (!empty($this->bodyTemplate)) $content = $this->environment->render(
            $this->bodyTemplate, 
            $this->bodyOptions
        );

        return $content;
    }

    public function fetchFooter(): string
    {
        $content = $this->footer;

        $this->footerOptions['id'] = $this->id;

        if (!empty($this->footerTemplate)) $content = $this->environment->render(
            $this->footerTemplate, 
            $this->footerOptions
        );

        return $content;
    }
}