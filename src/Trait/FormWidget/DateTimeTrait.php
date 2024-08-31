<?php 
namespace OSW3\UX\Trait\FormWidget;

use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait DateTimeTrait
{
    #[ExposeInTemplate(name: 'days', getter: 'fetchDays')]
    public array $days = [];

    #[ExposeInTemplate(name: 'selectedDay', getter: 'fetchSelectedDay')]
    public string|int $selectedDay;

    #[ExposeInTemplate(name: 'months', getter: 'fetchMonths')]
    public array $months = [];

    #[ExposeInTemplate(name: 'selectedMonth', getter: 'fetchSelectedMonth')]
    public string|int $selectedMonth;

    #[ExposeInTemplate(name: 'years', getter: 'fetchYears')]
    public array $years = [];

    #[ExposeInTemplate(name: 'selectedYear', getter: 'fetchSelectedYear')]
    public string|int $selectedYear;

    #[ExposeInTemplate(name: 'hours', getter: 'fetchHours')]
    public array $hours = [];

    #[ExposeInTemplate(name: 'selectedHour', getter: 'fetchSelectedHour')]
    public string|int $selectedHour;

    #[ExposeInTemplate(name: 'minutes', getter: 'fetchMinutes')]
    public array $minutes = [];

    #[ExposeInTemplate(name: 'selectedMinute', getter: 'fetchSelectedMinute')]
    public string|int $selectedMinute;

    #[ExposeInTemplate(name: 'seconds', getter: 'fetchSeconds')]
    public array $seconds = [];

    #[ExposeInTemplate(name: 'selectedSecond', getter: 'fetchSelectedSecond')]
    public string|int $selectedSecond;

    private function dateTimeResolver(&$resolver): static
    {
        $resolver->setDefault('days', []);
        $resolver->setAllowedTypes('days', ['array']);
        
        $resolver->setDefault('selectedDay', date('d'));
        $resolver->setAllowedTypes('selectedDay', ['string','integer']);

        $resolver->setDefault('months', []);
        $resolver->setAllowedTypes('months', ['array']);
        
        $resolver->setDefault('selectedMonth', date('m'));
        $resolver->setAllowedTypes('selectedMonth', ['string','integer']);

        $resolver->setDefault('years', []);
        $resolver->setAllowedTypes('years', ['array']);
        
        $resolver->setDefault('selectedYear', date('Y'));
        $resolver->setAllowedTypes('selectedYear', ['string','integer']);

        $resolver->setDefault('hours', []);
        $resolver->setAllowedTypes('hours', ['array']);
        
        $resolver->setDefault('selectedHour', date('H'));
        $resolver->setAllowedTypes('selectedHour', ['string','integer']);

        $resolver->setDefault('minutes', []);
        $resolver->setAllowedTypes('minutes', ['array']);
        
        $resolver->setDefault('selectedMinute', date('i'));
        $resolver->setAllowedTypes('selectedMinute', ['string','integer']);

        $resolver->setDefault('secondes', []);
        $resolver->setAllowedTypes('secondes', ['array']);
        
        $resolver->setDefault('selectedSecond', date('i'));
        $resolver->setAllowedTypes('selectedSecond', ['string','integer']);

        return $this;
    }

    public function fetchDays(): array
    {
        return $this->formatOption(!empty($this->days) ? $this->days : range(1,31));
    }
    public function fetchSelectedDay(): int 
    {
        return !$this->selected ? $this->selectedDay : (new \DateTime($this->selected))->format('d');
    }

    public function fetchMonths(): array
    {
        return $this->formatOption(!empty($this->months) ? $this->months : range(1,12));
    }
    public function fetchSelectedMonth(): int 
    {
        return !$this->selected ? $this->selectedMonth : (new \DateTime($this->selected))->format('m');
    }

    public function fetchYears(): array
    {
        $current = date('Y');
        $start   = $current + 5;
        $end     = $current - 5;

        return $this->formatOption(!empty($this->years) ? $this->years : range($start,$end));
    }
    public function fetchSelectedYear(): int 
    {
        return !$this->selected ? $this->selectedYear : (new \DateTime($this->selected))->format('Y');
    }

    public function fetchHours(): array
    {
        return $this->formatOption(!empty($this->hours) ? $this->hours : range(0,24));
    }
    public function fetchSelectedHour(): int 
    {
        return !$this->selected ? $this->selectedHour : (new \DateTime($this->selected))->format('H');
    }

    public function fetchMinutes(): array
    {
        return $this->formatOption(!empty($this->minutes) ? $this->minutes : range(0,59));
    }
    public function fetchSelectedMinute(): int 
    {
        return !$this->selected ? $this->selectedMinute : (new \DateTime($this->selected))->format('i');
    }

    public function fetchSeconds(): array
    {
        return $this->formatOption(!empty($this->seconds) ? $this->seconds : range(0,59));
    }
    public function fetchSelectedSecond(): int 
    {
        return !$this->selected ? $this->selectedSecond : (new \DateTime($this->selected))->format('i');
    }

    public function formatOption(array $options): array 
    {
        $options = array_combine($options, $options);
        $options = array_map(fn($options) => str_pad($options, 2, '0', STR_PAD_LEFT), $options);
        return $options;
    }
}