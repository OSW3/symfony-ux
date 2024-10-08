<?php 
namespace OSW3\UX\Components\Ux\Accordion;

use OSW3\UX\Components\Ux\Accordion;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Components\AbstractComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/accordion/content.twig')]
final class Content extends AbstractComponent
{
    use AttributeClassTrait;
    
    #[ExposeInTemplate(name: 'content')]
    public ?string $content;

    #[PreMount]
    public function preMount(array $data): array
    {
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
            ->classResolver($resolver)
        ;

        $resolver->setRequired('content');
        $resolver->setAllowedTypes('content', ['null','string']);

        return $resolver->resolve($data) + $data;
    }

    protected function getComponentClassname(): string 
    {
        return $this->prefix . Accordion::NAME . "-content";
    }
}