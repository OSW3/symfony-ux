<?php 
namespace OSW3\UX\Components\Accordion;

use OSW3\UX\Components\Accordion;
use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Components\AbstractComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@UxComponents/accordion/header.twig')]
final class Header extends AbstractComponent
{
    use AttributeIdTrait;
    use AttributeClassTrait;
    
    #[ExposeInTemplate(name: 'title')]
    public string $title;
    
    #[ExposeInTemplate(name: 'open', getter: 'fetchOpen')]
    public ?bool $open;

    #[PreMount]
    public function preMount(array $data): array
    {
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
            ->idResolver($resolver)
            ->classResolver($resolver)
        ;

        $resolver->setRequired('title');
        $resolver->setAllowedTypes('title', ['string']);

        $resolver->setDefaults(['open' => false]);
        $resolver->setAllowedTypes('open', ['null','bool']);

        return $resolver->resolve($data) + $data;
    }

    protected function getComponentClassname(): string 
    {
        return $this->prefix . Accordion::NAME . "-header";
    }

    public function fetchOpen(): bool
    {
        return $this->open === true;
    }
}