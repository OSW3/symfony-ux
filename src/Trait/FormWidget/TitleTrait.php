<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait TitleTrait
{
    #[ExposeInTemplate(name: 'title', getter: 'fetchTitle')]
    public string|null $title = null;

    private function titleResolver(&$resolver): static
    {
        $resolver->setDefault('title', null);
        $resolver->setAllowedTypes('title', ['string','null']);

        return $this;
    }

    public function fetchTitle(): ?string
    {
        return $this->title; 
    }
}