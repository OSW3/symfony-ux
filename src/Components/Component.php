<?php 
namespace OSW3\UX\Components;

use OSW3\UX\Exception\ComponentException;
use OSW3\UX\DependencyInjection\Configuration;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

abstract class Component 
{
    protected array $config;
    protected string $prefix;

    public function __construct(
        #[Autowire(service: 'service_container')] private ContainerInterface $container,
        protected UrlGeneratorInterface $urlGenerator,
        protected Environment $environment
    )
    {
        $this->config = $container->getParameter(Configuration::NAME);
        $this->prefix = empty($this->config['prefix']) ? $this->config['prefix'] : "{$this->config['prefix']}-";
    }

    protected function getConfig(): array 
    {
        return $this->config['components'][static::NAME];
    }

    protected function getComponentClassname(): string 
    {
        return $this->prefix . static::NAME;
    }

    protected function checkItemProperties($item, $expected)
    {
        $properties = array_keys($item);
        $intersect = array_intersect($properties, $expected);

        if (count($intersect) != count($properties)) {
            $unexpected = array_diff($properties, $expected);
            throw new ComponentException(sprintf("Unexpected properties in the Accordion item definition \"%s\". Expected are \"%s\"", implode('","', $unexpected), implode('","', $expected)));
        }
    }
}