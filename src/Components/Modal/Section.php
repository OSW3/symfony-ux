<?php 
namespace OSW3\UX\Components\Modal;

use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Components\AbstractComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@UxComponents/modal/section.twig')]
final class Section extends AbstractComponent
{
    public const NAME = "modal";
    
    use DoNotExposeTrait;
    use AttributeIdTrait;
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

        $resolver->setRequired('id');
        $resolver->setAllowedTypes('id', ['string']);

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