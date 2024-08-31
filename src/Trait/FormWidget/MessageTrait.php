<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait MessageTrait
{
    #[ExposeInTemplate(name: 'message', getter: 'fetchMessage')]
    public string|null $message = null;

    private function messageResolver(&$resolver): static
    {
        $resolver->setDefault('message', null);
        $resolver->setAllowedTypes('message', ['string','null']);

        return $this;
    }

    public function fetchMessage(): ?string
    {
        return $this->message;
    }
}