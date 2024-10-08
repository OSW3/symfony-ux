<?php 
namespace OSW3\UX\Components\Ux\Navigation;

use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/navigation/bridge-menu.twig')]
final class Menu 
{
    public const NAME = "navigation";

    public array $options;

    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;

    #[ExposeInTemplate(name: 'justify', getter: 'fetchJustify')]
    private string $justify;

    #[ExposeInTemplate(name: 'orientation', getter: 'fetchOrientation')]
    private string $orientation;

    #[ExposeInTemplate(name: 'label', getter: 'fetchLabel')]
    private string $label;

    #[ExposeInTemplate(name: 'items', getter: 'fetchItems')]
    private array $items;

    #[PreMount]
    public function preMount(array $data): array
    {
        // $options  = $this->getConfig();
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
            ->idResolver($resolver)
            ->classResolver($resolver)
            ->datasetResolver($resolver)
        ;

        return $resolver->resolve($data) + $data;
    }


    public function fetchJustify(): string
    {
        return $this->options['justify'] ?? "";
    }

    public function fetchOrientation(): string
    {
        return $this->options['orientation'] ?? "";
    }

    public function fetchLabel(): string
    {
        return $this->options['label'] ?? "";
    }

    public function fetchItems(): array
    {
        return $this->options['items'] ?? [];
    }
}