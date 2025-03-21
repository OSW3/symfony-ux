<?php 
namespace OSW3\UX\Components\Component\Search;

use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Components\Component;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/search/form.twig')]
final class Form extends Component
{
    public const NAME = "search";
    
    use DoNotExposeTrait;

    #[ExposeInTemplate(name: 'method')]
    public string $method;

    #[ExposeInTemplate(name: 'param')]
    public string $param;

    #[ExposeInTemplate(name: 'placeholder')]
    public string $placeholder;

    #[ExposeInTemplate(name: 'autocomplete')]
    public bool $autocomplete;

    #[ExposeInTemplate(name: 'label')]
    public string $label;

    #[PreMount]
    public function preMount(array $data): array
    {
        $options  = $this->getConfig();
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        // $this
        //     ->idResolver($resolver)
        //     ->classResolver($resolver)
        //     ->datasetResolver($resolver)
        // ;

        $resolver->setDefault('method', $options['method']);
        $resolver->setAllowedValues('method', ['get', 'post']);
        $resolver->setAllowedTypes('method', ['string']);

        $resolver->setDefault('param', $options['param']);
        $resolver->setAllowedTypes('param', ['string']);

        $resolver->setDefault('placeholder', $options['placeholder']);
        $resolver->setAllowedTypes('placeholder', ['string']);

        $resolver->setDefault('autocomplete', $options['autocomplete']);
        $resolver->setAllowedTypes('autocomplete', ['bool']);

        $resolver->setDefault('label', $options['label']);
        $resolver->setAllowedTypes('label', ['string']);

        return $resolver->resolve($data) + $data;
    }
}