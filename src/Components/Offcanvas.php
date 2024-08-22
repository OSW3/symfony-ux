<?php 
namespace OSW3\UX\Components;

use OSW3\UX\Enum\PlacementX;
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

#[AsTwigComponent(template: '@UxComponents/offcanvas/base.twig')]
final class Offcanvas extends AbstractComponent
{
    public const NAME = "offcanvas";
    
    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeRelTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;

    #[ExposeInTemplate(name: 'placement', getter: 'doNotExpose')]
    public string $placement;
    
    #[ExposeInTemplate(name: 'show', getter: 'doNotExpose')]
    public bool $show;
    
    #[ExposeInTemplate(name: 'noCloseButton')]
    public bool $noCloseButton;
    
    #[ExposeInTemplate(name: 'backdrop')]
    public bool $backdrop;


    // Content Header 

    #[ExposeInTemplate(name: 'header', getter: 'fetchHeader')]
    public string $header;
    
    #[ExposeInTemplate(name: 'headerTemplate', getter: 'doNotExpose')]
    public string $headerTemplate;
    
    #[ExposeInTemplate(name: 'headerOptions', getter: 'doNotExpose')]
    public array $headerOptions;


    // Content Body 

    #[ExposeInTemplate(name: 'body', getter: 'fetchBody')]
    public string $body;
    
    #[ExposeInTemplate(name: 'bodyTemplate', getter: 'doNotExpose')]
    public string $bodyTemplate;
    
    #[ExposeInTemplate(name: 'bodyOptions', getter: 'doNotExpose')]
    public array $bodyOptions;


    // Content Footer

    #[ExposeInTemplate(name: 'footer', getter: 'fetchFooter')]
    public string $footer;
    
    #[ExposeInTemplate(name: 'footerTemplate', getter: 'doNotExpose')]
    public string $footerTemplate;
    
    #[ExposeInTemplate(name: 'footerOptions', getter: 'doNotExpose')]
    public array $footerOptions;


    #[PreMount]
    public function preMount(array $data): array
    {
        $options  = $this->getConfig();
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
            // ->idResolver($resolver)
            ->classResolver($resolver)
            ->datasetResolver($resolver)
        ;

        $resolver->setRequired('id');
        $resolver->setAllowedTypes('id', ['string']);

        $resolver->setDefault('placement', $options['placement']);
        $resolver->setAllowedTypes('placement', ['string']);
        $resolver->setAllowedValues('placement', PlacementX::toArray());

        $resolver->setDefault('show', $options['is_showed']);
        $resolver->setAllowedTypes('show', ['boolean']);

        $resolver->setDefault('noCloseButton', false);
        $resolver->setAllowedTypes('noCloseButton', ['boolean']);

        $resolver->setDefault('backdrop', $options['backdrop']);
        $resolver->setAllowedTypes('backdrop', ['boolean']);


        $resolver->setDefault('header', "");
        $resolver->setAllowedTypes('header', ['string']);

        $resolver->setDefault('headerTemplate', "");
        // $resolver->setDefault('headerTemplate', $options['header_template']);
        $resolver->setAllowedTypes('headerTemplate', ['string']);

        $resolver->setDefault('headerOptions', []);
        $resolver->setAllowedTypes('headerOptions', ['array']);


        $resolver->setDefault('body', "");
        $resolver->setAllowedTypes('body', ['string']);

        $resolver->setDefault('bodyTemplate', "");
        // $resolver->setDefault('headerTemplate', $options['body_template']);
        $resolver->setAllowedTypes('bodyTemplate', ['string']);

        $resolver->setDefault('bodyOptions', []);
        $resolver->setAllowedTypes('bodyOptions', ['array']);


        $resolver->setDefault('footer', "");
        $resolver->setAllowedTypes('footer', ['string']);

        $resolver->setDefault('footerTemplate', "");
        // $resolver->setDefault('headerTemplate', $options['footer_template']);
        $resolver->setAllowedTypes('footerTemplate', ['string']);

        $resolver->setDefault('footerOptions', []);
        $resolver->setAllowedTypes('footerOptions', ['array']);

        return $resolver->resolve($data) + $data;
    }

    public function fetchClass(): string
    {
        $classList = $this->classList();
        $classList[] = "{$this->getComponentClassname()}-{$this->placement}";

        if ($this->backdrop === false) {
            $classList[] = "{$this->getComponentClassname()}-no-backdrop";
        }

        if ($this->show === true) {
            $classList[] = 'show';
        }

        return implode(" ", $classList);
    }

    public function fetchHeader(): string
    {
        $content = $this->header;

        if (!empty($this->headerTemplate)) $content = $this->environment->render(
            $this->headerTemplate, 
            $this->headerOptions
        );

        return $content;
    }

    public function fetchBody(): string
    {
        $content = $this->body;

        if (!empty($this->bodyTemplate)) $content = $this->environment->render(
            $this->bodyTemplate, 
            $this->bodyOptions
        );

        return $content;
    }

    public function fetchFooter(): string
    {
        $content = $this->footer;

        if (!empty($this->footerTemplate)) $content = $this->environment->render(
            $this->footerTemplate, 
            $this->footerOptions
        );

        return $content;
    }
}