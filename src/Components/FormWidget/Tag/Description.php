<?php 
namespace OSW3\UX\Components\FormWidget\Tag;

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
    public string $tag;

    #[ExposeInTemplate(name: 'icon', getter: 'fetchIcon')]
    public string|null $icon = null;

    #[ExposeInTemplate(name: 'iconType')]
    public string|null $iconType = null;

    #[ExposeInTemplate(name: 'iconValue')]
    public string|null $iconValue = null;

    #[PreMount]
    public function preMount(array $data): array {

        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
            ->idResolver($resolver)
            ->messageResolver($resolver)
        ;

        $resolver->setDefault('tag', 'p');
        $resolver->setAllowedTypes('tag', ['string']);

        $resolver->setDefault('icon', null);
        $resolver->setAllowedTypes('icon', ['string','null']);

        return $resolver->resolve($data) + $data;
    }

    public function fetchClass(): string {
        return "{$this->getComponentClassname()}-description";
    }

    /**
     * Don't render the Description if Message is empty
     */
    public function fetchRender(): bool {
        return !empty($this->message);
    }

    public function fetchIcon(): string|null {
        if ($this->icon) {
            preg_match('/^([^:]+):(.*)$/', $this->icon, $matches);
            $this->iconType = $matches[1] ?? 'font';
            $this->iconValue = $matches[2] ?? $this->icon;
        }

        return $this->icon;
    }
}