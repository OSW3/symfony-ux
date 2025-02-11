<?php 
namespace OSW3\UX\Components\FormWidget\Tag;

use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Components\Component;
use OSW3\UX\Trait\FormWidget\LabelTrait;
use OSW3\UX\Trait\FormWidget\RenderTrait;
use OSW3\UX\Trait\FormWidget\RequiredTrait;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/form-widget/tag/label/base.twig')]
class Label extends Component
{
    public const NAME = "form-widget";

    use AttributeClassTrait;
    use LabelTrait;
    use RequiredTrait;
    use RenderTrait;
    
    #[ExposeInTemplate(name: 'for')]
    public string|null $for;

    #[ExposeInTemplate(name: 'hidden')]
    public bool $hidden;

    #[ExposeInTemplate(name: 'icon', getter: 'fetchIcon')]
    public string|null $icon;

    #[PreMount]
    public function preMount(array $data): array
    {
        // $options  = $this->getConfig();
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
            ->labelResolver($resolver)
            ->requiredResolver($resolver)
            ->renderResolver($resolver)
        ;

        $resolver->setDefault('for', null);
        $resolver->setAllowedTypes('for', ['string', 'null']);

        $resolver->setDefault('hidden', false);
        $resolver->setAllowedTypes('hidden', ['bool']);

        $resolver->setDefault('icon', null);
        $resolver->setAllowedTypes('icon', ['string', 'null']);

        return $resolver->resolve($data) + $data;
    }

    public function fetchClass(): string
    {
        $classList = [];
        $classList[] = "{$this->getComponentClassname()}-label";

        // TODO: remove commented code
        // if ($this->required) {
        //     $classList[] = "required";
        // }

        return implode(" ", $classList);
    }

    public function fetchIcon()
    {
        return $this->icon;
    }

    public function fetchRender(): bool 
    {
        return !empty($this->label);
    }
}