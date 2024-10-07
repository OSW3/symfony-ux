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

#[AsTwigComponent(template: '@UxComponents/accordion/item.twig')]
final class Item extends AbstractComponent
{
    use AttributeIdTrait;
    use AttributeClassTrait;
    
    #[ExposeInTemplate(name: 'headerTag')]
    public string $headerTag;
    
    #[ExposeInTemplate(name: 'open', getter: 'fetchOpen')]
    public ?bool $open;
    
    #[ExposeInTemplate(name: 'title')]
    public string $title;
    
    #[ExposeInTemplate(name: 'content', getter: 'fetchContent')]
    public ?string $content;
    
    #[ExposeInTemplate(name: 'template')]
    public ?string $template;

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

        $resolver->setDefault('headerTag', $options['header']['tag']);
        $resolver->setAllowedTypes('headerTag', ['string']);

        $resolver->setDefaults(['open' => false]);
        $resolver->setAllowedTypes('open', ['null','bool']);

        $resolver->setRequired('title');
        $resolver->setAllowedTypes('title', ['string']);

        $resolver->setRequired('content');
        $resolver->setAllowedTypes('content', ['null','string']);

        return $resolver->resolve($data) + $data;
    }

    protected function getConfig(): array 
    {
        return $this->config['components']['accordions'];
    }

    protected function getComponentClassname(): string 
    {
        return $this->prefix . Accordion::NAME . "-item";
    }

    public function fetchOpen(): bool
    {
        return $this->open === true;
    }

    public function fetchClass(): string
    {
        $classList = $this->classList();

        if ($this->open)
        {
            $classList[] = "open";
        }

        return implode(" ", $classList);
    }

    public function fetchContent(): ?string
    {
        $content = $this->content;

        if ($this->template != null) {
            $content = $this->environment->render($this->template);
        }

        return $content;
    }
}