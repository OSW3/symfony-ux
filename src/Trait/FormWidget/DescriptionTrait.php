<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait DescriptionTrait
{
    #[ExposeInTemplate(name: 'description', getter: 'fetchDescription')]
    public string|null $description = null;

    #[ExposeInTemplate(name: 'descriptionIcon', getter: 'fetchDescriptionIcon')]
    public string|null $descriptionIcon = null;

    #[ExposeInTemplate(name: 'descriptionTag', getter: 'fetchDescriptionTag')]
    public string $descriptionTag;

    #[ExposeInTemplate(name: 'descriptionId', getter: 'fetchDescriptionId')]
    private string|null $descriptionId = null;

    private function descriptionResolver(&$resolver): static
    {
        $resolver->setDefault('description', null);
        $resolver->setAllowedTypes('description', ['string','null']);

        $resolver->setDefault('descriptionIcon', null);
        $resolver->setAllowedTypes('descriptionIcon', ['string','null']);

        $resolver->setDefault('descriptionTag', "p");
        $resolver->setAllowedTypes('descriptionTag', ['string']);

        return $this;
    }

    public function fetchDescription(): ?string
    {
        return $this->description;
    }

    public function fetchDescriptionIcon(): ?string
    {
        return $this->descriptionIcon;
    }

    public function fetchDescriptionTag(): ?string
    {
        return $this->descriptionTag;
    }

    public function fetchDescriptionId(): string|null
    {
        $id = null;

        if (!empty($this->description)) {
            $id = "{$this->fetchId()}-description";
        }

        return $id;
    }
}