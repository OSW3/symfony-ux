<?php 
namespace OSW3\UX\Components;

use OSW3\UX\DependencyInjection\Configuration;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class AbstractComponent 
{
    protected array $config;
    protected string $prefix;

    public function __construct(
        #[Autowire(service: 'service_container')] private ContainerInterface $container,
    )
    {
        $this->config = $container->getParameter(Configuration::NAME);
        $this->prefix = empty($this->config['prefix']) ? $this->config['prefix'] : "{$this->config['prefix']}-";
    }
}