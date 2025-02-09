<?php 
namespace OSW3\UX\Components\Component;

use OSW3\UX\Components\Component;
use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/breadcrumb/base.twig')]
final class Breadcrumb extends Component
{
    public const NAME = "breadcrumb";
    
    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;
    
    #[ExposeInTemplate(name: 'items', getter: 'fetchItems')]
    public array $items;

    #[PreMount]
    public function preMount(array $data): array
    {
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
            ->idResolver($resolver)
            ->classResolver($resolver)
            ->datasetResolver($resolver)
        ;

        $resolver->setDefault('items', []);
        $resolver->setAllowedTypes('items', ['array']);

        return $resolver->resolve($data) + $data;
    }

    public function fetchItems(): array {
        $options  = $this->getConfig();
        $items = $this->items;

        if ($options['home']['label'] || $options['home']['icon']) {
            $label = '';
            $icon  = '';
            $url   = '';
            
            if ($options['home']['icon']) {
                $icon = $options['home']['icon'];
            }
            if ($options['home']['label']) {
                $label = $options['home']['label'];
            }

            if ($options['home']['url']) {
                $url = $options['home']['url'];
            }
            if ($options['home']['route']) {
                $url = $this->urlGenerator->generate($options['home']['route']);
            }

            array_unshift($items, [
                'label' => $label,
                'icon'  => $icon,
                'url'   => $url,
            ]);
        }


        foreach ($items as $key => $item) {
            $item = array_merge([
                'label' => '',
                'icon'  => '',
                'url'   => '',
            ], $item);

            if (isset($item['route'])) {
                $item['url'] = $this->urlGenerator->generate($item['route']);
            }

            $items[$key] = $item;
        }

        return $items;
    }
}