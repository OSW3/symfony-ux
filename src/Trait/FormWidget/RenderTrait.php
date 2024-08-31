<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait RenderTrait
{
    #[ExposeInTemplate(name: 'render', getter: 'fetchRender')]
    private bool $render = true;

    public function renderResolver($resolver): static
    {
        $resolver->setDefault('render', true);
        $resolver->setAllowedTypes('render', ['bool']);

        return $this;
    }
    
    public function fetchRender(): bool 
    {
        return $this->render;
    }
}