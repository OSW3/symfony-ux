<?php 
namespace OSW3\UX\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use OSW3\UX\DependencyInjection\Configuration;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;

class BreadcrumbExtension extends Extension implements PrependExtensionInterface 
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
		// dump("do on load");
		// dump($this->getAlias());


		// Default Config
		// --
		
		$config = $this->processConfiguration(new Configuration(), $configs);
		$container->setParameter($this->getAlias(), $config);		
        

		// Bundle config location
		// --
		
		$locator = new FileLocator(__DIR__.'/../../config');
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
        $twigConfig['paths'][__DIR__.'/../../templates'] = "Breadcrumb";

        $container->prependExtensionConfig('twig', $twigConfig);
    }
}