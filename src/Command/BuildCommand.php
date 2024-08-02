<?php 

namespace OSW3\UX\Command;

use Symfony\Component\Filesystem\Path;
use OSW3\UX\DependencyInjection\Configuration;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

#[AsCommand(
    name: 'ux:build',
    description: 'Export Symfony parameters to SCSS variables',
)]
class BuildCommand extends Command
{
    private array $options;

    public function __construct(ParameterBagInterface $params)
    {
        $options = $params->all();
        $this->options = $options[Configuration::NAME];

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Export Symfony parameters to SCSS variables');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io              = new SymfonyStyle($input, $output);
        $sassVarDir      = Path::join(__DIR__, "../../", "assets/sass");
        $sassVariables   = [];
        $sassVariables[] = "// Last gen: ". date("Y-m-d H:i:s");

        foreach ($this->options['layout'] as $name => $value) match ($name) {
            'breakpoints'    => $this->uxBreakpoints($sassVariables, $value),
            'spacer'         => $this->uxSpacer($sassVariables, $value),
            'transitions'    => $this->uxTransitions($sassVariables, $value),
            'default_theme'  => $this->uxDefaultTheme($sassVariables, $value),
            'grid_divisions' => $this->uxGridDivisions($sassVariables, $value),
            default => null,
        };

        file_put_contents("{$sassVarDir}/_generated.scss", implode("\n", $sassVariables));
        $io->success("SCSS variables exported successfully.");

        return Command::SUCCESS;
    }

    private function uxGridDivisions(array &$vars, $value)
    {
        $vars[] = "\$grid-divisions: {$value};";
    }

    private function uxBreakpoints(array &$vars, $options)
    {
        $breakpoints = $options['base'];
        $additional  = $options['additional'];
        $useless     = $options['useless'];

        foreach ($breakpoints as $breakpoint) 
        {
            $vars[] = "\$breakpoint-name-{$breakpoint['name']}: '{$breakpoint['name']}';";
            $vars[] = "\$breakpoint-{$breakpoint['name']}: {$breakpoint['breakpoint']}px;";
            $vars[] = "\$container-{$breakpoint['name']}: {$breakpoint['container']}px;";
        }

        // Additional breakpoints
        if (!empty($additional)) {

            $sassString = '$additional-breakpoints: (';

            foreach ($additional as $name => $values) {
                $sassString .= "'$name': (breakpoint: {$values['breakpoint']}px, container: {$values['container']}px), ";
            }
        
            $sassString = rtrim($sassString, ', ');
            $sassString .= ');';

            $vars[] = $sassString;
        }

        // Excludes breakpoints
        if (!empty($useless)) {
            $vars[] = "\$useless-breakpoints: ('".implode("','", $useless)."');";
        }
    }
    
    private function uxSpacer(array &$vars, $options)
    {
        foreach ($options as $name => $value)
        {
            $name = str_replace("spacer_", "", $name);

            if ($name === 'base') {
                $value.= 'rem';
            }

            $vars[] = "\$spacer-{$name}: {$value};";
        }
    }
    
    private function uxTransitions(array &$vars, $transitions)
    {
        foreach ($transitions as $name => $value)
        {
            $vars[] = "\$transition-{$name}: {$value};";
        }
    }

    private function uxDefaultTheme(array &$vars, $name)
    {
        $vars[] = "\$theme-default: '{$name}';";
    }
}
