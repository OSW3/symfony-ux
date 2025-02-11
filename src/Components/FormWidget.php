<?php 
namespace OSW3\UX\Components;

use OSW3\UX\Components\Component;
use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\FormWidget\MaxTrait;
use OSW3\UX\Trait\FormWidget\MinTrait;
use OSW3\UX\Trait\FormWidget\FormTrait;
use OSW3\UX\Trait\FormWidget\NameTrait;
use OSW3\UX\Trait\FormWidget\SizeTrait;
use OSW3\UX\Trait\FormWidget\StepTrait;
use OSW3\UX\Trait\FormWidget\ColsTrait;
use OSW3\UX\Trait\FormWidget\IconTrait;
use OSW3\UX\Trait\FormWidget\RowsTrait;
use OSW3\UX\Trait\FormWidget\WrapTrait;
use OSW3\UX\Trait\FormWidget\LabelTrait;
use OSW3\UX\Trait\FormWidget\ValueTrait;
use OSW3\UX\Trait\FormWidget\GroupTrait;
use OSW3\UX\Trait\FormWidget\TitleTrait;
use OSW3\UX\Trait\FormWidget\AcceptTrait;
use OSW3\UX\Trait\FormWidget\WidgetTrait;
use OSW3\UX\Trait\FormWidget\FormatTrait;
use OSW3\UX\Trait\FormWidget\CheckedTrait;
use OSW3\UX\Trait\FormWidget\ChoicesTrait;
use OSW3\UX\Trait\FormWidget\DirnameTrait;
use OSW3\UX\Trait\FormWidget\PatternTrait;
use OSW3\UX\Trait\FormWidget\DisabledTrait;
use OSW3\UX\Trait\FormWidget\MultipleTrait;
use OSW3\UX\Trait\FormWidget\ReadonlyTrait;
use OSW3\UX\Trait\FormWidget\RequiredTrait;
use OSW3\UX\Trait\FormWidget\SelectedTrait;
use OSW3\UX\Trait\FormWidget\DateTimeTrait;
use OSW3\UX\Trait\FormWidget\TabIndexTrait;
use OSW3\UX\Trait\FormWidget\AutofocusTrait;
use OSW3\UX\Trait\FormWidget\PhoneCodeTrait;
use OSW3\UX\Trait\FormWidget\ContainerTrait;
use OSW3\UX\Trait\FormWidget\MaxlengthTrait;
use OSW3\UX\Trait\FormWidget\MinlengthTrait;
use OSW3\UX\Trait\FormWidget\PlainTextTrait;
use OSW3\UX\Trait\FormWidget\SpellcheckTrait;
use OSW3\UX\Trait\FormWidget\WidgetTypeTrait;
use OSW3\UX\Trait\FormWidget\DescriptionTrait;
use OSW3\UX\Trait\FormWidget\PlaceholderTrait;
use OSW3\UX\Trait\FormWidget\AutocompleteTrait;
use OSW3\UX\Trait\FormWidget\InlineTrait;
use OSW3\UX\Trait\FormWidget\NoInteractionTrait;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: '@SymfonyUx/form-widget/widget.twig')]
class FormWidget extends Component
{
    // Container
    use WidgetTrait;
    use ContainerTrait;
    use AttributeIdTrait;
    use AttributeClassTrait;

    // Label
    use LabelTrait;
    
    // Description
    use DescriptionTrait;
    
    // Control
    use AcceptTrait;
    use AutocompleteTrait;
    use AutofocusTrait;
    use CheckedTrait;
    use ChoicesTrait;
    use ColsTrait;
    use DateTimeTrait;
    use DirnameTrait;
    use DisabledTrait;
    use FormatTrait;
    use FormTrait;
    use GroupTrait;
    use IconTrait;
    use InlineTrait;
    use MaxlengthTrait;
    use MaxTrait;
    use MinlengthTrait;
    use MinTrait;
    use MultipleTrait;
    use NameTrait;
    use NoInteractionTrait;
    use PatternTrait;
    use PhoneCodeTrait;
    use PlaceholderTrait;
    use PlainTextTrait;
    use ReadonlyTrait;
    use RequiredTrait;
    use RowsTrait;
    use SelectedTrait;
    use SizeTrait;
    use SpellcheckTrait;
    use StepTrait;
    use TabIndexTrait;
    use TitleTrait;
    use ValueTrait;
    use WidgetTypeTrait;
    use WrapTrait;

    public const NAME = "form-widget";

    private string $defaultId;

    #[PreMount]
    public function preMount(array $data): array
    {
        $this->defaultId = "_".uniqid();

        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
            ->acceptResolver($resolver)
            ->autocompleteResolver($resolver)
            ->autofocusResolver($resolver)
            ->checkedResolver($resolver)
            ->choicesResolver($resolver)
            ->classResolver($resolver)
            ->colsResolver($resolver)
            ->containerResolver($resolver)
            ->dateTimeResolver($resolver)
            ->dirnameResolver($resolver)
            ->disabledResolver($resolver)
            ->descriptionResolver($resolver)
            ->formatResolver($resolver)
            ->formResolver($resolver)
            ->groupResolver($resolver)
            ->iconResolver($resolver)
            ->inlineResolver($resolver)
            ->idResolver($resolver)
            ->labelResolver($resolver)
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
            ->rowsResolver($resolver)
            ->selectedResolver($resolver)
            ->sizeResolver($resolver)
            ->spellcheckResolver($resolver)
            ->stepResolver($resolver)
            ->tabIndexResolver($resolver)
            ->titleResolver($resolver)
            ->typeResolver($resolver)
            ->valueResolver($resolver)
            ->widgetResolver($resolver)
            ->wrapResolver($resolver)
        ;

        return $resolver->resolve($data) + $data;
    }

    public function fetchId()
    {
        return empty($this->id) ? $this->defaultId : $this->id;
    }

    public function fetchClass(): string {
        $classList = $this->classList();
        $classList[] = "{$this->getComponentClassname()}-{$this->type}";
        
        if ($this->inline) {
            $classList[] = "{$this->getComponentClassname()}-inline";
        }

        if(!empty($this->class)) {
            $classList[] = $this->class;
        }

        $classList = array_unique($classList);
        
        return implode(" ", $classList);
    }

    public function fetchGroup(): bool {
        $isGroup = $this->isGroup;

        if (!empty($this->icon)) {
            $isGroup = true;
        }

        return $isGroup;
    }
}