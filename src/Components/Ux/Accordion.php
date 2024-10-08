<?php 
namespace OSW3\UX\Components\Ux;

use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeRelTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use OSW3\UX\Components\AbstractComponent;
use OSW3\UX\Enum\Accordion\Item\Properties;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/accordion/base.twig')]
final class Accordion extends AbstractComponent
{
    public const NAME = "accordion";
    
    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeRelTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;
    
    #[ExposeInTemplate(name: 'items', getter: 'fetchItems')]
    public array $items;
    
    #[ExposeInTemplate(name: 'multiple', getter: 'fetchMultiple')]
    public bool $multiple;
    
    #[ExposeInTemplate(name: 'headerTag')]
    public string $headerTag;

    #[PreMount]
    public function preMount(array $data): array
    {
        $options  = $this->getConfig();
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
            ->idResolver($resolver)
            ->classResolver($resolver)
            ->datasetResolver($resolver)
        ;

        $resolver->setDefault('items', []);
        $resolver->setAllowedTypes('items', ['array']);

        $resolver->setDefault('multiple', $options['multiple']);
        $resolver->setAllowedTypes('multiple', ['bool']);

        $resolver->setDefault('headerTag', $options['header']['tag']);
        $resolver->setAllowedTypes('headerTag', ['string']);

        return $resolver->resolve($data) + $data;
    }

    protected function getConfig(): array 
    {
        return $this->config['components']['accordions'];
    }

    public function fetchMultiple()
    {
        $this->dataset['multiple'] = $this->multiple;
    }

    public function fetchItems()
    {
        $expected = Properties::toArray();
        $defaults = array_flip( array_values($expected) );
        array_walk($defaults, fn(&$property) => $property = null);

        foreach ($this->items as $key => $item)
        {
            $this->checkItemProperties($item, $expected);
            $this->items[$key] = array_merge($defaults, $item);

            if (empty($this->items[$key]['id'])) {
                $this->items[$key]['id'] = uniqid();
            }
        }

        return $this->items;
    }
}