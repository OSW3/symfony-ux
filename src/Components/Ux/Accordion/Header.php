<?php 
namespace OSW3\UX\Components\Ux\Accordion;

use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Components\Ux\Accordion;
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

    #[ExposeInTemplate(name: 'tag')]
    public string $tag;
    
    #[ExposeInTemplate(name: 'title')]
    public string $title;
    
    #[ExposeInTemplate(name: 'open', getter: 'fetchOpen')]
    public ?bool $open;

    #[PreMount]
    public function preMount(array $data): array
    {
        $options  = $this->getConfig();
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
            ->idResolver($resolver)
            ->classResolver($resolver)
        ;

        $resolver->setDefault('tag', $options['header']['tag']);
        $resolver->setAllowedTypes('tag', ['string']);

        $resolver->setRequired('title');
        $resolver->setAllowedTypes('title', ['string']);

        $resolver->setDefaults(['open' => false]);
        $resolver->setAllowedTypes('open', ['null','bool']);

        return $resolver->resolve($data) + $data;
    }

    protected function getConfig(): array 
    {
        return $this->config['components']['accordions'];
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