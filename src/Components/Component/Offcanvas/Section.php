<?php 
namespace OSW3\UX\Components\Component\Offcanvas;

use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Components\Component;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/offcanvas/section.twig')]
final class Section extends Component
{
    public const NAME = "offcanvas";
    
    use DoNotExposeTrait;
    use AttributeClassTrait;
    
    #[ExposeInTemplate(name: 'section', getter: 'doNotExpose')]
    public string $section;

    #[ExposeInTemplate(name: 'tag', getter: 'fetchTag')]
    private string $tag;


    #[PreMount]
    public function preMount(array $data): array
    {
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $resolver->setDefaults(['section' => "body"]);
        $resolver->setAllowedTypes('section', ['string']);
        $resolver->setAllowedValues('section', ['header', 'body', 'footer']);

        return $resolver->resolve($data) + $data;
    }

    public function fetchClass(): string
    {
        $classList = [];
        $classList[] = "{$this->getComponentClassname()}-{$this->section}";

        return implode(" ", $classList);
    }

    public function fetchTag()
    {
        return match ($this->section) {
            'header' => "header",
            'footer' => "footer",
            default => "div"
        };
    }
}