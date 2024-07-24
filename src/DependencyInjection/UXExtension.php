<?php 
namespace OSW3\UX\DependencyInjection;

use Symfony\Component\Filesystem\Path;
use Symfony\Component\Config\FileLocator;
use OSW3\UX\DependencyInjection\Configuration;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;

class UXExtension extends Extension implements PrependExtensionInterface 
{
	/**
	 * Bundle configuration Injection
	 *
	 * @param array $configs
	 * @param ContainerBuilder $container
	 *
	 * @return void
	 */
	public function load(array $configs, ContainerBuilder $container)
    {
		// Default Config
		// --
		
		$config = $this->processConfiguration(new Configuration(), $configs);
		$container->setParameter($this->getAlias(), $config);		
        

		// Bundle config location
		// --
		
		$locator = new FileLocator(Path::join(__DIR__, "/../../", "config"));
		$loader = new YamlFileLoader($container, $locator);
		

		// Services Injection
		// --
		
		$loader->load('services.yaml');
    }

	/**
	 * Prepend some data to the global app configuration
	 *
	 * @param ContainerBuilder $container
	 *
	 * @return void
	 */
	public function prepend(ContainerBuilder $container)
    {
        // Extend Twig configuration
        // --

        $twigConfig = [];
        $twigConfig['paths'][Path::join(__DIR__, "/../../", "templates")] = "UxComponents";

        $container->prependExtensionConfig('twig', $twigConfig);
    }
}