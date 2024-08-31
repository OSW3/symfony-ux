<?php 
namespace OSW3\UX\Trait\FormWidget;

use OSW3\UX\Enum\FormWidget\PhoneCodes;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait PhoneCodeTrait
{
    #[ExposeInTemplate(name: 'phoneCode', getter: 'fetchPhoneCode')]
    public bool $phoneCode = true;

    #[ExposeInTemplate(name: 'phoneCodeChoices', getter: 'fetchPhoneCodeChoices')]
    public array $phoneCodeChoices = [];

    private function phoneCodeResolver(&$resolver): static
    {
        $resolver->setDefault('phoneCode', true);
        $resolver->setAllowedTypes('phoneCode', ['bool']);

        $resolver->setDefault('phoneCodeChoices', []);
        $resolver->setAllowedTypes('phoneCodeChoices', ['array']);

        return $this;
    }

    public function fetchPhoneCode(): bool
    {
        return $this->phoneCode;
    }

    public function fetchPhoneCodeChoices(): array
    {
        $codes = PhoneCodes::toArray();

        if (!empty($this->phoneCodeChoices)) {
            $codes = $this->phoneCodeChoices;
        }

        return $codes;
    }
}