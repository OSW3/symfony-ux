<?php 
namespace OSW3\UX\Components\Ux;

use OSW3\UX\Enum\Size;
use OSW3\UX\Enum\Palette;
use OSW3\UX\Enum\Button\Type;
use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use OSW3\UX\Components\AbstractComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@UxComponents/button/base.twig')]
class Button extends AbstractComponent
{
    public const NAME = "button";
    
    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;
    
    #[ExposeInTemplate(name: 'type', getter: 'fetchType')]
    public string $type;

    #[ExposeInTemplate(name: 'label', getter: 'fetchLabel')]
    public ?string $label;

    #[ExposeInTemplate(name: 'disabled')]
    public bool $disabled;

    // Button as link

    #[ExposeInTemplate(name: 'url', getter: 'fetchUrl')]
    public ?string $url;

    #[ExposeInTemplate(name: 'target')]
    public ?string $target;

    // Button styles

    #[ExposeInTemplate(getter: 'doNotExpose')]
    public string $is;

    #[ExposeInTemplate(getter: 'doNotExpose')]
    public bool $outline;

    #[ExposeInTemplate(getter: 'doNotExpose')]
    public string $size;
    
    #[ExposeInTemplate(getter: 'doNotExpose')]
    public bool $block;

    // #[ExposeInTemplate(getter: 'doNotExpose')]
    // public string $effect;

    // Event

    #[ExposeInTemplate(getter: 'doNotExpose')]
    public string $eventHandler;

    #[PreMount]
    public function preMount(array $data): array
    {
        // $options  = $this->getConfig();
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $resolver->setDefaults(['type' => Type::BUTTON->value]);
        $resolver->setAllowedValues('type', Type::toArray());

        $resolver->setDefault('label', null);
        $resolver->setAllowedTypes('label', ['null','string']);

        $resolver->setDefaults(['disabled' => false]);
        $resolver->setAllowedTypes('disabled', ['boolean']);

        // Button as link

        $resolver->setDefaults(['url' => ""]);
        $resolver->setAllowedTypes('url', ['string']);

        $resolver->setDefaults(['target' => "_self"]);
        $resolver->setAllowedTypes('target', ['string']);

        $defaultIsValue = 'none';
        $allowedIsValues = Palette::toArray();
        $allowedIsValues = array_merge([$defaultIsValue => $defaultIsValue], $allowedIsValues);
        $resolver->setDefaults(['is' => $defaultIsValue]);
        $resolver->setAllowedTypes('is', ['string']);
        $resolver->setAllowedValues('is', $allowedIsValues);

        $resolver->setDefaults(['outline' => false]);
        $resolver->setAllowedTypes('outline', ['boolean']);

        $resolver->setDefaults(['size' => Size::NORMAL->value]);
        $resolver->setAllowedTypes('size', 'string');
        $resolver->setAllowedValues('size', Size::toArray());

        $resolver->setDefaults(['block' => false]);
        $resolver->setAllowedTypes('block', ['boolean']);

        // $resolver->setDefaults(['effect' => Effect::NONE->value]);
        // $resolver->setAllowedTypes('effect', ['string']);
        // $resolver->setAllowedValues('effect', Effect::toArray());

        // Event

        $resolver->setDefaults(['eventHandler' => ""]);
        $resolver->setAllowedTypes('eventHandler', ['string']);

        $this
            ->idResolver($resolver)
            ->classResolver($resolver)
            ->datasetResolver($resolver)
        ;
        return $resolver->resolve($data) + $data;
    }

    public function fetchType(): string 
    {
        return $this->type;
    }

    public function fetchLabel(): string 
    {
        if ($this->type != 'close' && empty($this->label)) {
            throw new \Exception(sprintf("The required option \"label\" is missing for the \"%s\" component.", ucfirst(static::NAME)));
        }

        return $this->label;
    }

    public function fetchUrl(): ?string
    {
        if ($this->type == 'link' && empty($this->url)) {
            throw new \Exception(sprintf("Empty URL for the \"%s\" component with a type \"link\".", ucfirst(static::NAME)));
        }

        return $this->url;
    }

    public function fetchClass(): string
    {
        $classlist = $this->classList();

        $classlist[] = $this->outline 
            ? "{$this->getComponentClassname()}-{$this->is}-outline"
            : "{$this->getComponentClassname()}-{$this->is}"
        ;

        if ($this->block) {
            $classlist[] = "{$this->getComponentClassname()}-block";
        }

        if (in_array($this->size, Size::toArray()) && $this->size != Size::NORMAL->value)
        {
            $classlist[] = "{$this->getComponentClassname()}-{$this->size}";
        }

        // if (in_array($this->effect, Effect::toArray()) && $this->effect != Effect::NONE->value)
        // {
        //     $this->classlistService->add("effect");
        //     $this->classlistService->add("effect-{$this->effect}");
        // }

        return implode(" ", $classlist);
    }
}