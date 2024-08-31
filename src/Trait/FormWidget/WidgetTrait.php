<?php 
namespace OSW3\UX\Trait\FormWidget;

use OSW3\UX\Components\FormWidget\Birthday;
use OSW3\UX\Enum\FormWidget\Type;
use OSW3\UX\Enum\FormWidget\WidgetType;
use Symfony\Component\Form\FormView;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait WidgetTrait
{
    #[ExposeInTemplate(name: 'widget', getter: 'fetchWidget')]
    public FormView|null $widget = null;

    private function widgetResolver(&$resolver): static
    {
        $resolver->setDefault('widget', null);

        return $this;
    }


    public function fetchWidget() 
    {
        if ($this->widget) {

            // Id
            // --

            $this->id = $this->widget->vars['id'] ?? null;

            // Name
            // --
            
            $this->name = $this->widget->vars['full_name'] ?? null;

            // Label
            // --
            
            $widget_label = $this->widget->vars['label'] ?? null;

            if (empty($widget_label)) {
                $widget_label = $this->widget->vars['name'];
            }

            $this->label = $widget_label;
            //   "label_attr" => []
            //   "label_format" => null
            //   "label_html" => false
            //   "label_translation_parameters" => []

            // Description
            // --
            
            $this->description = $this->widget->vars['help'] ?? null;
            //   "help_attr" => []
            //   "help_html" => false
            //   "help_translation_parameters" => []

            // Disabled 
            // --
            
            $this->disabled = $this->widget->vars['disabled'] ?? false;

            // Required 
            // --
            
            $this->required = $this->widget->vars['required'] ?? false;

            // Placeholder 
            // --
            
            $this->placeholder = $this->widget->vars['attr']['placeholder'] ?? null;

            // Readonly 
            // --
            
            $this->readonly = $this->widget->vars['attr']['readonly'] ?? false;

            // Value 
            // --
            
            $this->value = $this->widget->vars['value'] ?? null;
            // "data" => null

            // Type
            // --
            
            $widget_cache_key = $this->widget->vars['cache_key'];
            $widget_cache_key_arr = explode("_", $widget_cache_key);
            $widget_type = end($widget_cache_key_arr);

            $this->type = WidgetType::tryFrom($widget_type)?->value ?? WidgetType::TEXT->value;
            
            switch ($widget_type) 
            {
                // BirthdayType
                case WidgetType::BIRTHDAY->value: 
                    $current = date('Y');
                    $start   = $current;
                    $end     = $current - 100;
                    $this->years        = $this->formatOption(range($start,$end));
                    $this->months       = array_map(fn($choice) => $choice->value, $this->widget->children['month']->vars['choices']);
                    $this->days         = array_map(fn($choice) => $choice->value, $this->widget->children['day']->vars['choices']);
                    $this->format       = $this->parseDateFormat(preg_replace("/({|})/", "", $this->widget->vars['date_pattern']));
                    $this->formatInput  = $this->format;
                    $this->formatOutput = $this->format;
                    // $this->icon         = "fa-solid fa-cake-candles";
                break;

                // ChoiceType
                case WidgetType::CHOICE->value: 
                    $this->type = Type::CHOICE->value;
                break;

                // CountryType
                case WidgetType::COUNTRY->value: 
                    $this->type = Type::CHOICE->value;
                    // $this->icon = "fa-regular fa-flag";
                break;

                // CurrencyType
                case WidgetType::CURRENCY->value: 
                    $this->type = Type::CHOICE->value;
                    $this->icon = "fa-solid fa-money-bill-1-wave";
                break;

                // DateType
                case WidgetType::DATE->value: 
                    $this->years        = array_map(fn($choice) => $choice->value, $this->widget->children['year']->vars['choices']);
                    $this->months       = array_map(fn($choice) => $choice->value, $this->widget->children['month']->vars['choices']);
                    $this->days         = array_map(fn($choice) => $choice->value, $this->widget->children['day']->vars['choices']);
                    $this->format       = $this->parseDateFormat(preg_replace("/({|})/", "", $this->widget->vars['date_pattern']));
                    $this->formatInput  = $this->format;
                    $this->formatOutput = $this->format;
                break;

                // EnumType
                case WidgetType::ENUM->value: 
                    $this->type = Type::CHOICE->value;
                break;

                // FileType
                case WidgetType::FILE->value: 
                    $this->type = Type::FILE->value;
                    $this->icon = "fa-solid fa-upload";
                break;

                // IntegerType
                case WidgetType::INTEGER->value: 
                    $this->type         = WidgetType::NUMBER->value;
                    $this->icon         = "fa-solid fa-hashtag";
                    $this->iconPosition = "start";
                    // TODO: constraint step to be a n integer (1, 2, 40, 32) and min = 1
                    $this->step = "1";
                break;

                // LanguageType
                case WidgetType::LANGUAGE->value: 
                    $this->type = Type::CHOICE->value;
                    $this->icon = "fa-solid fa-language";
                break;

                // LocaleType
                case WidgetType::LOCALE->value: 
                    $this->type = Type::CHOICE->value;
                    $this->icon = "fa-solid fa-language";
                break;

                // MoneyType
                case WidgetType::MONEY->value: 
                    $this->type         = WidgetType::NUMBER->value;
                    $this->icon         = "fa-solid fa-dollar-sign";
                    $this->iconPosition = "end";
                break;

                // PercentType
                case WidgetType::PERCENT->value: 
                    $this->type         = WidgetType::NUMBER->value;
                    $this->icon         = "fa-solid fa-percent";
                    $this->iconPosition = "end";
                break;

                // TimeType
                case WidgetType::TIME->value: 
                    $this->hours        = array_map(fn($choice) => $choice->value, $this->widget->children['hour']->vars['choices']);
                    $this->minutes      = array_map(fn($choice) => $choice->value, $this->widget->children['minute']->vars['choices']);
                    $this->format       = ['hour','minute'];
                    $this->formatInput  = $this->format;
                    $this->formatOutput = $this->format;
                break;

                // TimeZoneType
                case WidgetType::TIMEZONE->value: 
                    $this->type = Type::CHOICE->value;
                    $this->icon = "fa-regular fa-clock";
                break;

                // UuidType
                case WidgetType::ULID->value: 
                    $this->type = WidgetType::TEXT->value;
                    $this->icon = "fa-solid fa-hashtag";
                break;

                // UlidType
                case WidgetType::UUID->value: 
                    $this->type = WidgetType::TEXT->value;
                    $this->icon = "fa-solid fa-hashtag";
                break;
            }



            // Choices

            if (isset($this->widget->vars['choices'])) {
                $widget_choices = [];

                array_map(function($choice) use (&$widget_choices) {
                    $widget_choices[$choice->value] = $choice->label;
                }, $this->widget->vars['choices']);

            
                $this->choices = $widget_choices;
            }



            // dump($this->widget);
            // dump("{$this->widget->vars['name']} : {$widget_type}");

            // $this->widget->setRendered(true);
        }

        return $this->widget;
    }
}