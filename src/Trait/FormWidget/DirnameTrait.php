<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait DirnameTrait
{
    #[ExposeInTemplate(name: 'dirname', getter: 'fetchDirname')]
    public bool $dirname = false;

    #[ExposeInTemplate(name: 'dirnameValue', getter: 'fetchDirnameValue')]
    private string|null $dirnameValue = null;

    private function dirnameResolver(&$resolver): static
    {
        $resolver->setDefault('dirname', false);
        $resolver->setAllowedTypes('dirname', ['bool']);

        return $this;
    }

    public function fetchDirname(): bool {
        return $this->dirname;
    }

    public function fetchDirnameValue(): string|null {
        $value = null;

        if ($this->dirname && $this->name) {
            $value = "{$this->name}.dir";
        }

        return $value;
    }
}