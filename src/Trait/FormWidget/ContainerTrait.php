<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait ContainerTrait
{
    #[ExposeInTemplate(name: 'container', getter: 'fetchContainer')]
    public bool $container = true;

    private function containerResolver(&$resolver): static
    {
        $resolver->setDefault('container', true);
        $resolver->setAllowedTypes('container', ['bool']);

        return $this;
    }

    public function fetchContainer(): bool
    {
        return $this->container;
    }
}