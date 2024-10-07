<?php 
namespace OSW3\UX\Components\Ux\FormWidget\Tag;

use OSW3\UX\Enum\FormWidget\Type;
use OSW3\UX\Components\FormWidget;
use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\FormWidget\FormTrait;
use OSW3\UX\Trait\FormWidget\NameTrait;
use OSW3\UX\Trait\FormWidget\TitleTrait;
use OSW3\UX\Components\AbstractComponent;
use OSW3\UX\Trait\FormWidget\ChoicesTrait;
use OSW3\UX\Trait\FormWidget\DisabledTrait;
use OSW3\UX\Trait\FormWidget\MultipleTrait;
use OSW3\UX\Trait\FormWidget\RequiredTrait;
use OSW3\UX\Trait\FormWidget\SelectedTrait;
use OSW3\UX\Trait\FormWidget\TabIndexTrait;
use OSW3\UX\Trait\FormWidget\AutofocusTrait;
use OSW3\UX\Trait\FormWidget\PlainTextTrait;
use OSW3\UX\Trait\FormWidget\NoInteractionTrait;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: '@UxComponents/form-widget/tag/select/base.twig')]
class Select extends AbstractComponent
{
    public const NAME = "form-widget";
    
    use AttributeIdTrait;
    use AttributeClassTrait;

    use AutofocusTrait;
    use ChoicesTrait;
    use DisabledTrait;
    use FormTrait;
    use MultipleTrait;
    use NameTrait;
    use NoInteractionTrait;
    use PlainTextTrait;
    use RequiredTrait;
    use TabIndexTrait;
    use SelectedTrait;
    use TitleTrait;

    #[PreMount]
    public function preMount(array $data): array
    {
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
            ->autofocusResolver($resolver)
            ->choicesResolver($resolver)
            ->disabledResolver($resolver)
            ->formResolver($resolver)
            ->idResolver($resolver)
            ->multipleResolver($resolver)
            ->nameResolver($resolver)
            ->noInteractionResolver($resolver)
            ->plainTextResolver($resolver)
            ->requiredResolver($resolver)
            ->tabIndexResolver($resolver)
            ->selectedResolver($resolver)
            ->titleResolver($resolver)
        ;

        return $resolver->resolve($data) + $data;
    }

    public function fetchClass(): string
    {
        $classBase = "{$this->getComponentClassname()}-control";
        $classList = [];
        $classList[] = $classBase;

        // if (in_array($this->size, ['small', 'large'])) {
        //     $classList[] = "{$classBase}-{$this->size}";
        // }

        if ($this->plainText) {
            $classList[] = "{$classBase}-plaintext";
        }

        return implode(" ", $classList);
    }
}