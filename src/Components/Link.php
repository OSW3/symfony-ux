<?php 
namespace OSW3\UX\Components;

use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@UxComponents/link/base.twig')]
final class Link extends AbstractComponent
{    
    public const NAME = "link";

    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;

    #[ExposeInTemplate(name: 'label')]
    public string $label;

    #[ExposeInTemplate(name: 'icon')]
    public string $icon;

    #[ExposeInTemplate(name: 'href')]
    public string $url;

    #[ExposeInTemplate(name: 'target')]
    public string $target;

    #[ExposeInTemplate(name: 'isDisabled')]
    public bool $isDisabled;

    public bool $noClassLink;
    public bool $isActive;

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

        $resolver->setRequired('label');
        $resolver->setAllowedTypes('label', 'string');

        $resolver->setDefault('icon', "");
        $resolver->setAllowedTypes('icon', 'string');

        $resolver->setRequired('url');
        $resolver->setAllowedTypes('url', 'string');

        $resolver->setDefault('target', $options['target']);
        $resolver->setAllowedTypes('target', 'string');

        $resolver->setDefault('isDisabled', false);
        $resolver->setAllowedTypes('isDisabled', 'bool');

        $resolver->setDefault('noClassLink', false);
        $resolver->setAllowedTypes('noClassLink', 'bool');

        $resolver->setDefault('isActive', false);
        $resolver->setAllowedTypes('isActive', 'bool');

        return $resolver->resolve($data) + $data;
    }

    protected function getConfig(): array 
    {
        return $this->config['components']['links'];
    }

    public function fetchClass(): string
    {
        $classList = [];
        
        if (!$this->noClassLink) $classList[] = $this->getComponentClassname();
        if ($this->isActive)     $classList[] = 'active';

        $classList[] = $this->class;

        return implode(" ", $classList);
    }
}