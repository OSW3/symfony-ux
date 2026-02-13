<?php 
namespace OSW3\UX\DependencyInjection;

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Filesystem\Path;
use Symfony\Component\Config\Definition\ArrayNode;
use Symfony\Component\Config\Definition\ScalarNode;
use OSW3\UX\DependencyInjection\DefinitionConfigurator;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\PrototypedArrayNode;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
	/**
	 * define the name of the configuration tree.
	 * > /config/packages/symfony_ux.yaml
	 *
	 * @var string
	 */
	public const NAME = "symfony_ux";

	/**
	 * Define the translation domain
	 *
	 * @var string
	 */
	public const DOMAIN = 'symfony_ux';

	/**
	 * Update and return the Configuration Builder
	 *
	 * @return TreeBuilder
	 */
	public function getConfigTreeBuilder(): TreeBuilder
    {
        $definition = require Path::join(__DIR__, "../../", "config/definition/definition.php");
        $builder    = new TreeBuilder( static::NAME );

        $definition(new DefinitionConfigurator($builder->getRootNode()));

		return $builder;
    }

	public function generateProjectConfig(string $projectDir): void
	{
        $configFile = Path::join($projectDir, "config/packages", static::NAME.".yaml");
        
        if (!file_exists($configFile)) 
		{
			$configArray = $this->generateArray($this);
	
			file_put_contents($configFile, Yaml::dump([
				static::NAME => $configArray
			], 4));
			
		}
	}

    private function generateArray(ConfigurationInterface $configuration): array
    {
        $treeBuilder = $configuration->getConfigTreeBuilder();
        $rootNode = $treeBuilder->buildTree();
        
        return $this->processNode($rootNode);
    }

    private function processNode($node)
    {
        $result = [];
		
        if ($node instanceof ArrayNode || $node instanceof PrototypedArrayNode) {
            foreach ($node->getChildren() as $childName => $childNode) {
                $result[$childName] = $this->processNode($childNode);
            }
        } elseif ($node instanceof ScalarNode) {
            $result = $node->getDefaultValue();
        }

        return $result;
    }
}