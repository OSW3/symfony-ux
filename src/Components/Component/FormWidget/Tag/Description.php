<?php 
namespace OSW3\UX\Components\Component\FormWidget\Tag;

use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Components\Component;
use OSW3\UX\Trait\FormWidget\DescriptionTrait;
use OSW3\UX\Trait\FormWidget\MessageTrait;
use OSW3\UX\Trait\FormWidget\RenderTrait;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/form-widget/tag/description/base.twig')]
class Description extends Component
{
    public const NAME = "form-widget";

    use AttributeIdTrait;
    use AttributeClassTrait;
    use MessageTrait;
    use RenderTrait;

    #[ExposeInTemplate(name: 'tag')]
    public string $tag = 'p';

    #[PreMount]
    public function preMount(array $data): array
    {
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
            ->idResolver($resolver)
            ->messageResolver($resolver)
        ;

        $resolver->setDefault('tag', 'p');
        $resolver->setAllowedTypes('tag', ['string']);

        return $resolver->resolve($data) + $data;
    }

    public function fetchClass(): string
    {
        return "{$this->getComponentClassname()}-description";
    }

    public function fetchRender(): bool 
    {
        return !empty($this->message);
    }
}