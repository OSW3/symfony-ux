<?php 
namespace OSW3\UX\Components\Component\Brand;

use OSW3\UX\Components\Component\Brand;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Components\Component;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/brand/link.twig')]
final class Link extends Component
{
    use AttributeClassTrait;

    #[ExposeInTemplate(name: 'figures')]
    public array|string $figures;

    #[ExposeInTemplate(name: 'link')]
    public string $link;

    #[ExposeInTemplate(name: 'name', getter: 'fetchName')]
    public ?string $name;

    #[ExposeInTemplate(name: 'tagline')]
    public ?string $tagline;

    #[PreMount]
    public function preMount(array $data): array
    {
        $options  = $this->getConfig();
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this->classResolver($resolver);

        $resolver->setDefault('figures', $options['figures']);
        $resolver->setAllowedTypes('figures', ['array','string']);


        // $resolver->setRequired('name');
        $resolver->setDefault('name', $options['name']);
        $resolver->setAllowedTypes('name', ['null', 'string']);

        $resolver->setDefault('tagline', "");
        $resolver->setAllowedTypes('tagline', ['null', 'string']);

        $resolver->setRequired('link');
        $resolver->setAllowedTypes('link', ['string']);

        return $resolver->resolve($data) + $data;
    }

    protected function getConfig(): array 
    {
        return $this->config['components'][Brand::NAME];
    }

    protected function getComponentClassname(): string 
    {
        return $this->prefix . Brand::NAME . "-link";
    }

    public function fetchName(): ?string
    {
        $options = $this->getConfig();
        $name = null;

        if (!empty($options['name'])) {
            $name = $options['name'];
        }

        if (!empty($this->name)) {
            $name = $this->name;
        }

        return trim($name ?? '');
    }
}