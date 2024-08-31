<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait WrapTrait
{
    #[ExposeInTemplate(name: 'wrap', getter: 'fetchWrap')]
    public string $wrap = "soft";

    private function wrapResolver(&$resolver): static
    {
        $resolver->setDefault('wrap', "soft");
        $resolver->setAllowedValues('wrap', ['soft','hard']);
        $resolver->setAllowedTypes('wrap', ['string']);

        return $this;
    }

    public function fetchWrap(): ?string
    {
        return $this->wrap;
    }
}