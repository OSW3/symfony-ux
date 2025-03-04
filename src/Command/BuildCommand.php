<?php 

namespace OSW3\UX\Command;

use Symfony\Component\Filesystem\Path;
use OSW3\UX\DependencyInjection\Configuration;
use OSW3\UX\Enum\SearchBox\Type;
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
        $io                = new SymfonyStyle($input, $output);
        $lastGen           = "// Last gen: ". date("Y-m-d H:i:s");
        
        $sassVarDir        = Path::join(__DIR__, "../../", "assets/sass");
        $sassVariables     = [];
        $sassVariables[]   = $lastGen;
        
        $scriptVarDir      = Path::join(__DIR__, "../../", "assets/scripts");
        $scriptVariables   = [];
        $scriptVariables[] = $lastGen;

        // Prefix
        // --

        if (isset($this->options['prefix'])) {
            $sassVariables[] = "\$prefix: '{$this->options['prefix']}';";
            $scriptVariables[] = "export const PREFIX = '{$this->options['prefix']}';";
        }

        // Var CSS Function
        // --

        if (isset($this->options['var_default'])) {
            $sassVariables[] = "\$varWithDefault: ". ($this->options['var_default'] ? 'true' : 'false') .";";
            // $scriptVariables[] = "export const PREFIX = '{$this->options['prefix']}';";
        }


        // Layout
        // --
        
        foreach ($this->options['layout'] as $name => $value) match ($name) {
            'breakpoints'    => $this->uxBreakpoints($sassVariables, $value),
            'colors'         => $this->uxColors($sassVariables, $value),
            'ui_colors'      => $this->uxUiColors($sassVariables, $value),
            'spacer'         => $this->uxSpacer($sassVariables, $value),
            'transitions'    => $this->uxTransitions($sassVariables, $value),
            'theme'          => $this->uxDefaultTheme($sassVariables, $value),
            'grid'           => $this->uxGridSystem($sassVariables, $value),
            'columns'        => $this->uxColumnsSystem($sassVariables, $value),
            default => null,
        };


        // Components
        // --
        
        foreach ($this->options['components'] as $name => $value) match ($name) {
            'accordions'    => $this->accordions($sassVariables, $value),
            'alerts'        => $this->alerts($sassVariables, $value),
            'brand'         => $this->brand($sassVariables, $value),
            'breadcrumb'    => $this->breadcrumb($sassVariables, $value),
            'header'        => $this->header($sassVariables, $value),
            'menu'          => $this->menu($sassVariables, $value),
            'offcanvas'     => $this->offcanvas($sassVariables, $value),
            'rating'        => $this->rating($scriptVariables, $value),
            'search_box'    => $this->searchBox($scriptVariables, $value),
            'scroll_to_top' => $this->scrollToTop($sassVariables, $value),
            'toast'         => $this->toast($sassVariables, $scriptVariables, $value),
            default => null,
        };


        // Generate Files
        // --

        file_put_contents("{$sassVarDir}/_generated.scss", implode("\n", $sassVariables))
            ? $output->writeln("-> <info>SCSS variables exported successfully.</info>")
            : $output->writeln("-> <error>Failed to export SCSS variables.</error>")
        ;

        file_put_contents("{$scriptVarDir}/generated.js", implode("\n", $scriptVariables))
            ? $output->writeln("-> <info>JS variables exported successfully.</info>")
            : $output->writeln("-> <error>Failed to export JS variables.</error>")
        ;

        $output->writeln("");

        // $io->success("SCSS variables exported successfully.");

        return Command::SUCCESS;
    }

    private function uxGridSystem(array &$sassVariables, $grid)
    {
        $sassVariables[] = "\$grid-divisions: {$grid['divisions']};";

        $gridColumns = $grid['columns'] ? 'true' : 'false';
        $sassVariables[] = "\$grid-columns: {$gridColumns};";

        $gridAlignments = $grid['alignments'] ? 'true' : 'false';
        $sassVariables[] = "\$grid-alignments: {$gridAlignments};";
    }

    private function uxColumnsSystem(array &$sassVariables, $columns)
    {
        $columnsSizes = $columns['sizes'] ? 'true' : 'false';
        $sassVariables[] = "\$columns-sizes: {$columnsSizes};";

        $columnsOffset = $columns['offset'] ? 'true' : 'false';
        $sassVariables[] = "\$columns-offset: {$columnsOffset};";

        $columnsShift = $columns['shift'] ? 'true' : 'false';
        $sassVariables[] = "\$columns-shift: {$columnsShift};";
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

                $name = str_replace("_", "-", $name);
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

    private function uxColors(array &$vars, $options)
    {
        $defaults   = $options['defaults'];
        $additional = $options['additional'];
        $useless    = $options['useless'];
        $shades     = $options['shades'];
        $tints      = $options['tints'];

        foreach ($defaults as $name => $value)
        {
            $vars[] = "\${$name}: {$value};";
        }

        $additional_collection = [];
        foreach ($additional as $name => $value)
        {
            $name = str_replace("_", "-", $name);
            $vars[] = "\${$name}: {$value};";
            $additional_collection[] = "'{$name}': \${$name}";
        }
        if (!empty($additional_collection))
        {
            $vars[] = "\$generated-additional-colors: (". implode(",", $additional_collection) .");";
        }

        $useless_collection = [];
        foreach ($useless as $name)
        {
            $useless_collection[] = "'{$name}'";
        }
        if (!empty($useless_collection))
        {
            $vars[] = "\$generated-useless-colors: (". implode(",", $useless_collection) .");";
        }

        $shades_collection = [];
        foreach ($shades as $name => $values)
        {
            $name = str_replace("_", "-", $name);
            $shades_collection[] = "'{$name}' : (". implode(",", $values) .")";
        }
        if (!empty($shades_collection))
        {
            $vars[] = "\$generated-colors-shades: (". implode(",", $shades_collection) .");";
        }

        $tints_collection = [];
        foreach ($tints as $name => $values)
        {
            $name = str_replace("_", "-", $name);
            $tints_collection[] = "'{$name}' : (". implode(",", $values) .")";
        }
        if (!empty($tints_collection))
        {
            $vars[] = "\$generated-colors-tints: (". implode(",", $tints_collection) .");";
        }
    }

    private function uxUiColors(array &$vars, $options)
    {
        $defaults   = $options['defaults'];
        $additional = $options['additional'];
        $useless    = $options['useless'];

        foreach ($defaults as $name => $value)
        {
            $vars[] = "\$ui-color-name-{$name}: '{$value}';";
        }

        $additional_collection = [];
        foreach ($additional as $name => $value)
        {
            $name = str_replace("_", "-", $name);
            $vars[] = "\${$name}: {$value};";
            $additional_collection[] = "'{$name}': {$value}";
        }
        if (!empty($additional_collection))
        {
            $vars[] = "\$generated-additional-ui-colors: (". implode(",", $additional_collection) .");";
        }

        $useless_collection = [];
        foreach ($useless as $name)
        {
            $useless_collection[] = "'{$name}'";
        }
        if (!empty($useless_collection))
        {
            $vars[] = "\$generated-useless-palette: (". implode(",", $useless_collection) .");";
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
            $value = $name != 'base' ? $value : "{$value}s";
            $vars[] = "\$transition-{$name}: {$value};";
        }
    }

    private function uxDefaultTheme(array &$vars, $theme)
    {
        $vars[] = "\$theme-default: '{$theme['default']}';";
    }

    private function accordions(array &$vars, $options)
    {
        // Content max height
        $contentMaxHeight = $options['content']['max_height'];

        if ($contentMaxHeight !== null) {
            $vars[] = "\$accordion--item--content--max-height: {$contentMaxHeight}px;";
        }
    }

    private function alerts(array &$sassVariables, $options)
    {
        $hasPalette = $options['palette'] ? 'true' : 'false';
        $sassVariables[] = "\$alerts--enable-palette: {$hasPalette};";

        $isSizeEnabled = $options['sizes'] ? 'true' : 'false';
        $sassVariables[] = "\$alerts--enable-sizes: {$isSizeEnabled};";
    }

    private function brand(array &$sassVariables, $options) {
        $brandBreakpoint = [];

        if (isset($options['figures'])) {
            $brandBreakpoint = array_keys($options['figures']);
        }
        $sassVariables[] = "\$brand--breakpoints: ('".implode("','", $brandBreakpoint)."');";
        $sassVariables[] = "\$brand--direction: {$options['direction']};";
        $sassVariables[] = "\$brand--justify: {$options['justify']};";
    }

    private function breadcrumb(array &$sassVariables, $options)
    {
        $sassVariables[] = "\$breadcrumb--separator: {$options['separator']};";
    }

    private function header(array &$sassVariables, $options)
    {
        if ($options['expandAt']) {
            $sassVariables[] = "\$header-expand-at: {$options['expandAt']};";
        }
    }

    private function menu(array &$sassVariables, $options)
    {
        if ($options['expandAt']) {
            $sassVariables[] = "\$menu-expand-at: {$options['expandAt']};";
        }
    }

    private function offcanvas(array &$vars, $options)
    {
        // $vars[] = "\$offcanvas--has-backdrop: ".($options['backdrop'] ? 'true' : 'false').";";
    }

    private function rating(array &$scriptVariables, $options)
    {
        $scriptVariables[] = "export const RATING_LEGENDS = ". json_encode($options['legends']) .";";
    }
    
    private function searchBox(array &$vars, $options)
    {
        $vars[] = "export const SEARCH_BOX_TYPES = ['". implode("','", Type::toArray()) ."'];";
        $vars[] = "export const SEARCH_BOX_SHORTCUT = '{$options['shortcut']}';";
    }

    private function scrollToTop(array &$vars, $options) {
        $vars[] = "\$scroll-to-top--shape: '{$options['shape']}';";
        $vars[] = "\$scroll-to-top--symbol: '{$options['symbol']}';";
        $vars[] = "\$scroll-to-top--position: '{$options['position']}';";
        $vars[] = "\$scroll-to-top--transition: '{$options['transition']}';";
    }

    private function toast(array &$sassVariables, array &$scriptVariables, $options) {

        $iconSize = str_ends_with($options['icon_size'], 'px') ? $options['icon_size'] : "{$options['icon_size']}px";
        $sassVariables[] = "\$toast--placement: '{$options['placement']}';";
        $sassVariables[] = "\$toast--duration: {$options['duration']}s;";
        $sassVariables[] = "\$toast--delay: {$options['delay']}s;";
        $sassVariables[] = "\$toast--icon-size: {$iconSize};";

        $jsDuration = $options['duration'] * 1000;
        $jsDelay    = $options['delay'] * 1000;
        $scriptVariables[] = "export const TOAST_DURATION = {$jsDuration};";
        $scriptVariables[] = "export const TOAST_DELAY = {$jsDelay};";
        $scriptVariables[] = "export const TOAST_ICON = '{$options['icon']}';";
    }
}
