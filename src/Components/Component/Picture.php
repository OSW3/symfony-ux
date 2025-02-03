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

#[AsTwigComponent(template: '@SymfonyUx/media/picture.twig')]
final class Picture extends Component
{
    public const NAME = "picture";
    
    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;

    #[ExposeInTemplate(name: 'src', getter: 'fetchSrc')]
    public string|array $src;
    
    #[ExposeInTemplate(name: 'srcset')]
    public array $srcset;

    #[ExposeInTemplate(name: 'alt')]
    public string|null $alt;

    #[ExposeInTemplate(name: 'lazy')]
    public bool $lazy;

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

        $resolver->setRequired('src');
        $resolver->setAllowedTypes('src', ['string', 'array']);

        $resolver->setDefault('srcset', []);
        $resolver->setAllowedTypes('srcset', ['array']);

        $resolver->setDefault('alt', null);
        $resolver->setAllowedTypes('alt', ['string', 'null']);

        $resolver->setDefault('lazy', false);
        $resolver->setAllowedTypes('lazy', ['bool']);

        return $resolver->resolve($data) + $data;
    }

    public function fetchSrc(): string|null {
        
        // Todo: build breakpoints
        $breakpoints = $this->config['layout']['breakpoints']['base'];

        $sources = $this->src;

        // convert: src string --> src array
        $sources = !is_array($sources) ? [[
            'src' => $sources,
            'default' => true,
        ]] : $sources;


        // format the breakpoint
        foreach ($sources as $key => $source) {
            if (isset($source['breakpoint'])) {
                $value = $source['breakpoint'];

                // find the breakpoint in the list of config breakpoints
                if (isset($breakpoints[$value])) {
                    $value = $breakpoints[$value]['breakpoint'];
                }

                $value = (int) $value;
                $sources[$key]['breakpoint'] = $value;
            }
        }


        // Sorting sources
        if (array_filter($sources, fn($source) => isset($source['breakpoint']))) {
            usort($sources, fn($a, $b) => $b['breakpoint'] - $a['breakpoint']);
        }

        // Define srcSet if multiple sources
        if (count($sources) > 1) {
            $this->srcset = $sources;
        }
        
        // Define the default source
        $defaultSources = array_filter($sources, fn($source) => isset($source['default']) && $source['default']);
        sort($defaultSources);

        return $defaultSources[0]['src'] ?? end($sources)['src'];
    }

    public function fetchDataset(): array
    {
        $dataset = [];
        $dataset = array_merge($dataset, $this->dataset);

        if ($this->lazy) {
            $dataset["{$this->prefix}lazy"] = true;
            // $dataset["{$this->getComponentClassname()}-lazy"] = true;
        }
        
        foreach ($dataset as $property => $value)
        {
            $dataset["data-{$property}"] = $value;
            unset($dataset[$property]);
        }

        return $dataset;
    }
}