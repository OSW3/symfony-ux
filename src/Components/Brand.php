<?php 
namespace OSW3\UX\Components;

use OSW3\UX\Enum\Size;
use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@UxComponents/brand/base.twig')]
final class Brand extends AbstractComponent
{
    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;

    #[ExposeInTemplate(getter: 'doNotExpose')]
    public string $size;
    
    #[ExposeInTemplate(name: 'name')]
    public ?string $name;
    
    #[ExposeInTemplate(name: 'tagline')]
    public ?string $tagline;
    
    #[ExposeInTemplate(name: 'link')]
    public ?string $link;
    
    #[ExposeInTemplate(name: 'logo')]
    public ?string $logo;
    
    #[ExposeInTemplate(name: 'icon')]
    public ?string $icon;

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

        $resolver->setDefault('size', Size::MEDIUM->value);
        $resolver->setAllowedTypes('size', 'string');
        $resolver->setAllowedValues('size', Size::toArray());

        // $resolver->setRequired('name');
        $resolver->setDefault('name', $options['name']);
        $resolver->setAllowedTypes('name', ['null', 'string']);

        $resolver->setDefault('tagline', $options['tagline']);
        $resolver->setAllowedTypes('tagline', ['null', 'string']);

        $resolver->setDefault('link', "");
        $resolver->setAllowedTypes('link', ['null', 'string']);

        $resolver->setDefault('logo', $options['logo']);
        $resolver->setAllowedTypes('logo', ['null', 'string']);

        $resolver->setDefault('icon', $options['icon']);
        $resolver->setAllowedTypes('icon', ['null', 'string']);

        return $resolver->resolve($data) + $data;
    }

    private function getConfig(): array 
    {
        return $this->config['components']['brand'];
    }

    public function getComponentClassname(): string 
    {
        return "{$this->prefix}brand";
    }

    public function fetchClass(): string
    {
        $classList = $this->classList();

        if (in_array($this->size, Size::toArray()) && $this->size != Size::NORMAL->value)
        {
            $classList[] = "{$this->getComponentClassname()}-{$this->size}";
        }

        return implode(" ", $classList);
    }
}