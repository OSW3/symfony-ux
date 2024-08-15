<?php 
namespace OSW3\UX\Components\Brand;

use OSW3\UX\Components\Brand;
use OSW3\UX\Components\AbstractComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@UxComponents/brand/inner.twig')]
final class Inner extends AbstractComponent
{
    #[ExposeInTemplate(name: 'name', getter: 'fetchName')]
    public ?string $name;

    #[ExposeInTemplate(name: 'tagline')]
    public string $tagline;

    #[ExposeInTemplate(name: 'logo')]
    public array $logo;

    #[PreMount]
    public function preMount(array $data): array
    {
        $options  = $this->getConfig();
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $resolver->setDefault('name', $options['name']);
        $resolver->setAllowedTypes('name', ['null', 'string']);

        $resolver->setDefault('tagline', $options['tagline']);
        $resolver->setAllowedTypes('tagline', ['null', 'string']);

        $resolver->setDefault('logo', $options['logo']);
        $resolver->setAllowedTypes('logo', ['array']);

        return $resolver->resolve($data) + $data;
    }

    protected function getConfig(): array 
    {
        return $this->config['components'][Brand::NAME];
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

        return trim($name);
    }
}