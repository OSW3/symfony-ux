<?php 
namespace OSW3\UX\Components\Component;

use OSW3\UX\Enum\Palette;
use OSW3\UX\Components\Component;
use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/callout/base.twig')]
final class Callout extends Component
{
    public const NAME = "callout";
    
    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;

    #[ExposeInTemplate(name: 'title')]
    public string|null $title;

    #[ExposeInTemplate(name: 'icon')]
    public string|null $icon;

    #[ExposeInTemplate(name: 'message', getter: 'fetchMessage')]
    public string|null $message;

    #[ExposeInTemplate(getter: 'doNotExpose')]
    public string $is;

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

        $resolver->setDefault('title', null);
        $resolver->setAllowedTypes('title', ['string', 'null']);

        $resolver->setDefault('icon', null);
        $resolver->setAllowedTypes('icon', ['string', 'null']);

        $resolver->setDefault('message', null);
        $resolver->setAllowedTypes('message', ['string', 'null']);

        $defaultIsValue = 'none';
        $allowedIsValues = Palette::toArray();
        $allowedIsValues = array_merge([$defaultIsValue => $defaultIsValue], $allowedIsValues);
        $resolver->setDefaults(['is' => $defaultIsValue]);
        $resolver->setAllowedTypes('is', ['string']);
        $resolver->setAllowedValues('is', $allowedIsValues);
        
        return $resolver->resolve($data) + $data;
    }

    public function fetchMessage(): string 
    {
        if (empty($this->message)) {
            throw new \Exception(sprintf("The required option \"message\" is missing for the \"%s\" component.", ucfirst(static::NAME)));
        }

        return $this->message;
    }

    public function fetchClass(): string
    {
        $classlist = $this->classList();

        if ($this->is != 'none') {
            $classlist[] = "{$this->getComponentClassname()}-{$this->is}";
        }

        return implode(" ", $classlist);
    }
}