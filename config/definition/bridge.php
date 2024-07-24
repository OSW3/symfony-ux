<?php 

use Symfony\Component\Filesystem\Path;
use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;

return static function (DefinitionConfigurator $configurator): void {
    $definition = require Path::join(__DIR__, "definition.php");
    $definition($configurator);
};