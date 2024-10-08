<?php 
namespace OSW3\UX\Components\Ux\FormWidget\Tag;

use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Components\AbstractComponent;
use OSW3\UX\Trait\FormWidget\AcceptTrait;
use OSW3\UX\Trait\FormWidget\AutocompleteTrait;
use OSW3\UX\Trait\FormWidget\AutofocusTrait;
use OSW3\UX\Trait\FormWidget\CheckedTrait;
use OSW3\UX\Trait\FormWidget\DirnameTrait;
use OSW3\UX\Trait\FormWidget\DisabledTrait;
use OSW3\UX\Trait\FormWidget\FormTrait;
use OSW3\UX\Trait\FormWidget\InputTypeTrait;
use OSW3\UX\Trait\FormWidget\MaxlengthTrait;
use OSW3\UX\Trait\FormWidget\MaxTrait;
use OSW3\UX\Trait\FormWidget\MinlengthTrait;
use OSW3\UX\Trait\FormWidget\MinTrait;
use OSW3\UX\Trait\FormWidget\MultipleTrait;
use OSW3\UX\Trait\FormWidget\NameTrait;
use OSW3\UX\Trait\FormWidget\NoInteractionTrait;
use OSW3\UX\Trait\FormWidget\PatternTrait;
use OSW3\UX\Trait\FormWidget\PhoneCodeTrait;
use OSW3\UX\Trait\FormWidget\PlaceholderTrait;
use OSW3\UX\Trait\FormWidget\PlainTextTrait;
use OSW3\UX\Trait\FormWidget\ReadonlyTrait;
use OSW3\UX\Trait\FormWidget\RequiredTrait;
use OSW3\UX\Trait\FormWidget\SizeTrait;
use OSW3\UX\Trait\FormWidget\SpellcheckTrait;
use OSW3\UX\Trait\FormWidget\StepTrait;
use OSW3\UX\Trait\FormWidget\TabIndexTrait;
use OSW3\UX\Trait\FormWidget\TitleTrait;
use OSW3\UX\Trait\FormWidget\ValueTrait;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: '@SymfonyUx/form-widget/tag/input/base.twig')]
class Input extends AbstractComponent
{
    public const NAME = "form-widget";
    
    use AttributeIdTrait;
    use AttributeClassTrait;
    use InputTypeTrait;

    use AcceptTrait;
    use AutocompleteTrait;
    use AutofocusTrait;
    use CheckedTrait;
    use DirnameTrait;
    use DisabledTrait;
    use FormTrait;
    use MaxlengthTrait;
    use MaxTrait;
    use MinlengthTrait;
    use MinTrait;
    use MultipleTrait;
    use NameTrait;
    use NoInteractionTrait;
    use PatternTrait;
    use PlaceholderTrait;
    use PlainTextTrait;
    use PhoneCodeTrait;
    use ReadonlyTrait;
    use RequiredTrait;
    use SizeTrait;
    use SpellcheckTrait;
    use StepTrait;
    use TabIndexTrait;
    use TitleTrait;
    use ValueTrait;

    #[PreMount]
    public function preMount(array $data): array
    {
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
            ->acceptResolver($resolver)
            ->autocompleteResolver($resolver)
            ->autofocusResolver($resolver)
            ->checkedResolver($resolver)
            ->dirnameResolver($resolver)
            ->disabledResolver($resolver)
            ->formResolver($resolver)
            ->idResolver($resolver)
            ->maxlengthResolver($resolver)
            ->maxResolver($resolver)
            ->minlengthResolver($resolver)
            ->minResolver($resolver)
            ->multipleResolver($resolver)
            ->nameResolver($resolver)
            ->noInteractionResolver($resolver)
            ->patternResolver($resolver)
            ->phoneCodeResolver($resolver)
            ->placeholderResolver($resolver)
            ->plainTextResolver($resolver)
            ->readonlyResolver($resolver)
            ->requiredResolver($resolver)
            ->sizeResolver($resolver)
            ->spellcheckResolver($resolver)
            ->stepResolver($resolver)
            ->tabIndexResolver($resolver)
            ->titleResolver($resolver)
            ->typeResolver($resolver)
            ->valueResolver($resolver)
        ;

        return $resolver->resolve($data) + $data;
    }

    public function fetchClass(): string
    {
        $classBase = "{$this->getComponentClassname()}-control";
        $classList = [];
        $classList[] = $classBase;

        if (in_array($this->size, ['small', 'large'])) {
            $classList[] = "{$classBase}-{$this->size}";
        }

        if ($this->plainText) {
            $classList[] = "{$classBase}-plaintext";
        }

        return implode(" ", $classList);
    }
}