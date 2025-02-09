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

#[AsTwigComponent(template: '@SymfonyUx/link/base.twig')]
final class Link extends Component
{    
    public const NAME = "link";

    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;

    #[ExposeInTemplate(name: 'label')]
    public string $label;

    #[ExposeInTemplate(name: 'icons', getter: 'fetchIcons')]
    public array $icons;

    #[ExposeInTemplate(name: 'icon')]
    public string $icon;
    
    #[ExposeInTemplate(name: 'iconType')]
    public string $iconType;

    #[ExposeInTemplate(name: 'iconValue')]
    public string $iconValue;

    #[ExposeInTemplate(name: 'iconPosition')]
    public string $iconPosition;

    #[ExposeInTemplate(name: 'href')]
    public string $url;

    #[ExposeInTemplate(name: 'target')]
    public string $target;

    #[ExposeInTemplate(name: 'isDisabled')]
    public bool $isDisabled;

    #[ExposeInTemplate(getter: 'doNotExpose')]
    public bool $noClassLink;
    
    #[ExposeInTemplate(getter: 'doNotExpose')]
    public bool $isActive;
    
    #[ExposeInTemplate(name: 'download')]
    public bool|string $download;

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

        $resolver->setDefault('icons', []);
        $resolver->setAllowedTypes('icons', 'array');

        $resolver->setDefault('iconType', "");
        $resolver->setAllowedTypes('iconType', 'string');

        $resolver->setDefault('iconValue', "");
        $resolver->setAllowedTypes('iconValue', 'string');
        
        $resolver->setDefault('iconPosition', "start");
        $resolver->setAllowedValues('iconPosition', ['start', 'end']);
        $resolver->setAllowedTypes('iconPosition', 'string');

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

        $resolver->setDefault('download', false);
        $resolver->setAllowedTypes('download', ['bool', 'string']);

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

    public function fetchIcons(): array {
        preg_match('/^([^:]+):(.*)$/', $this->icon, $matches);
        $icons = [];

        if ($this->download) array_push($icons, [
            'type'     => 'symbol',
            'value'    => 'external',
            'position' => 'end',
        ]);

        if (!empty($this->target) && $this->target != '_self' && $this->target != '_parent') array_push($icons, [
            'type'     => 'symbol',
            'value'    => 'download',
            'position' => 'start',
        ]);

        if (!empty($this->icon)) array_push($icons, [
            'type'     => $matches[1] ?? 'font',
            'value'    => $matches[2] ?? $this->icon,
            'position' => $this->iconPosition,
        ]);

        return $icons;
    }
}