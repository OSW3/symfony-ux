<?php 
namespace OSW3\UX\Components\Ux\FormWidget\Tag;

use OSW3\UX\Components\FormWidget;
use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\FormWidget\FormTrait;
use OSW3\UX\Trait\FormWidget\NameTrait;
use OSW3\UX\Trait\FormWidget\TitleTrait;
use OSW3\UX\Trait\FormWidget\ValueTrait;
use OSW3\UX\Components\AbstractComponent;
use OSW3\UX\Trait\FormWidget\DirnameTrait;
use OSW3\UX\Trait\FormWidget\PatternTrait;
use OSW3\UX\Trait\FormWidget\DisabledTrait;
use OSW3\UX\Trait\FormWidget\ReadonlyTrait;
use OSW3\UX\Trait\FormWidget\RequiredTrait;
use OSW3\UX\Trait\FormWidget\TabIndexTrait;
use OSW3\UX\Trait\FormWidget\AutofocusTrait;
use OSW3\UX\Trait\FormWidget\MaxlengthTrait;
use OSW3\UX\Trait\FormWidget\MinlengthTrait;
use OSW3\UX\Trait\FormWidget\PlainTextTrait;
use OSW3\UX\Trait\FormWidget\SpellcheckTrait;
use OSW3\UX\Trait\FormWidget\PlaceholderTrait;
use OSW3\UX\Trait\FormWidget\AutocompleteTrait;
use OSW3\UX\Trait\FormWidget\ColsTrait;
use OSW3\UX\Trait\FormWidget\NoInteractionTrait;
use OSW3\UX\Trait\FormWidget\RowsTrait;
use OSW3\UX\Trait\FormWidget\WrapTrait;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: '@SymfonyUx/form-widget/tag/textarea/base.twig')]
final class Textarea extends AbstractComponent
{
    public const NAME = "form-widget";
    
    use AttributeIdTrait;
    use AttributeClassTrait;

    use AutocompleteTrait;
    use AutofocusTrait;
    use ColsTrait;
    use DirnameTrait;
    use DisabledTrait;
    use FormTrait;
    use MaxlengthTrait;
    use MinlengthTrait;
    use NameTrait;
    use NoInteractionTrait;
    use PatternTrait;
    use PlaceholderTrait;
    use PlainTextTrait;
    use ReadonlyTrait;
    use RequiredTrait;
    use RowsTrait;
    use SpellcheckTrait;
    use TabIndexTrait;
    use TitleTrait;
    use ValueTrait;
    use WrapTrait;

    #[PreMount]
    public function preMount(array $data): array
    {
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
            ->autocompleteResolver($resolver)
            ->autofocusResolver($resolver)
            ->dirnameResolver($resolver)
            ->disabledResolver($resolver)
            ->formResolver($resolver)
            ->idResolver($resolver)
            ->maxlengthResolver($resolver)
            ->minlengthResolver($resolver)
            ->nameResolver($resolver)
            ->noInteractionResolver($resolver)
            ->patternResolver($resolver)
            ->placeholderResolver($resolver)
            ->plainTextResolver($resolver)
            ->readonlyResolver($resolver)
            ->requiredResolver($resolver)
            ->spellcheckResolver($resolver)
            ->tabIndexResolver($resolver)
            ->titleResolver($resolver)
            ->valueResolver($resolver)
            ->wrapResolver($resolver)
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