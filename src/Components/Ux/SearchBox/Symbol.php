<?php 
namespace OSW3\UX\Components\Ux\SearchBox;

use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Components\AbstractComponent;
use OSW3\UX\Trait\AttributeClassTrait;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@UxComponents/search-box/symbol.twig')]
final class Symbol extends AbstractComponent
{
    public const NAME = "search-box";

    use DoNotExposeTrait;
    use AttributeClassTrait;

    #[ExposeInTemplate(name: 'type')]
    public string $type;

    #[ExposeInTemplate(name: 'icon', getter: 'doNotExpose')]
    public string $icon;


    #[PreMount]
    public function preMount(array $data): array
    {
        // $options  = $this->getConfig();
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
        //     ->idResolver($resolver)
            ->classResolver($resolver)
            // ->datasetResolver($resolver)
        ;

        $resolver->setDefault('type', 'webfont');
        $resolver->setAllowedValues('type', ['webfont', 'image']);
        $resolver->setAllowedTypes('type', ['string']);

        $resolver->setDefault('icon', '');
        $resolver->setAllowedTypes('icon', ['string']);

        return $resolver->resolve($data) + $data;
    }

    // protected function getConfig(): array 
    // {
    //     return $this->config['components']['search_box'];
    // }

    public function fetchClass(): string
    {
        $classList = []; //$this->classList();
        $classList[] = "{$this->getComponentClassname()}-icon";
        $classList[] = $this->icon;

        return implode(" ", $classList);
    }
}