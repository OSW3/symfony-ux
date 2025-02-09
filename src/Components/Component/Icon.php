<?php 
namespace OSW3\UX\Components\Component;

use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use OSW3\UX\Components\Component;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/icon/base.twig')]
final class Icon extends Component
{    
    public const NAME = "icon";

    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;

    #[ExposeInTemplate(name: 'type')]
    public string $type;

    #[ExposeInTemplate(name: 'value')]
    public string $value;

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

        $resolver->setDefault('type', 'font');
        $resolver->setAllowedValues('type', ['font', 'img', 'symbol', 'data']);
        $resolver->setAllowedTypes('type', 'string');

        $resolver->setDefault('value', '');
        $resolver->setAllowedTypes('value', 'string');

        return $resolver->resolve($data) + $data;
    }

    public function fetchDataset(): array
    {
        $dataset = [];

        if ($this->type == 'data') {
            $dataset['icon'] = $this->value;
        }
        
        foreach ($dataset as $property => $value)
        {
            $dataset["data-{$property}"] = $value;
            unset($dataset[$property]);
        }

        return $dataset;
    }
}