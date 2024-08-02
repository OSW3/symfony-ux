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
    // protected static $defaultName = 'ux:build';
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
        $sassVarDir      = Path::join(__DIR__, "../../", "assets/sass/variables");
        $sassVariables   = [];
        $sassVariables[] = "// Last gen: ". date("Y-m-d H:i:s");



        foreach ($this->options['layout'] as $name => $value)
        {
            $property = str_replace("_", "-", $name);

            switch ($name)
            {
                case 'breakpoints':

                    $breakpoints = $value['base'];
                    $additional  = $value['additional'];
                    $useless     = $value['useless'];

                    // // Additional
                    // foreach ($additional as $breakpointName => $breakpointValue)
                    // {
                    //     $breakpoints[$breakpointName] = [
                    //         'name' => $breakpointName,
                    //         'value' => $breakpointValue,
                    //     ];
                    // }


                    // Sort breakpoint (mobile first)
                    // usort($breakpoints, function($a, $b) {
                    //     return $a['value'] <=> $b['value'];
                    // });

                    // dump($breakpoints);

                    foreach ($breakpoints as $breakpoint) 
                    {
                        $sassVariables[] = "\$breakpoint-name-{$breakpoint['name']}: '{$breakpoint['name']}';";
                        $sassVariables[] = "\$breakpoint-{$breakpoint['name']}: {$breakpoint['breakpoint']}px;";
                        $sassVariables[] = "\$container-{$breakpoint['name']}: {$breakpoint['container']}px;";
                    }

                    // Additional breakpoints
                    if (!empty($additional)) {
    
                        $sassString = '$additional-breakpoints: (';
    
                        foreach ($additional as $name => $values) {
                            $sassString .= "'$name': (breakpoint: {$values['breakpoint']}px, container: {$values['container']}px), ";
                        }
                    
                        $sassString = rtrim($sassString, ', ');
                        $sassString .= ');';

                        $sassVariables[] = $sassString;
                    }

                    // Excludes breakpoints
                    if (!empty($useless)) {
                        $sassVariables[] = "\$useless-breakpoints: ('".implode("','", $useless)."');";
                    }

                break;

                case 'default_theme':
                    $sassVariables[] = "\$theme-default: '{$value}';";
                break;

                case 'grid_divisions':
                default: 
                    $sassVariables[] = "\${$property}: {$value};";
            }
        }



        file_put_contents("{$sassVarDir}/_generated.scss", implode("\n", $sassVariables));
        $io->success("SCSS variables exported successfully.");

        return Command::SUCCESS;
    }
}
