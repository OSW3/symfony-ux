<?php 
namespace OSW3\UX;

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Filesystem\Path;
use OSW3\UX\DependencyInjection\UXExtension;
use OSW3\UX\DependencyInjection\Configuration;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;

class UXBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        $projectDir = $container->getParameter('kernel.project_dir');


        // Update dependency config
        // -- 

        $twig_component_Filepath = Path::join($projectDir, 'config/packages/twig_component.yaml' );
        
        if (file_exists($twig_component_Filepath))
        {
            $twig_component_YamlContent = file_get_contents( $twig_component_Filepath );
            $twig_component_ArrayContent = Yaml::parse($twig_component_YamlContent);
            
            // Search Bundle Components namespace
            $classPath = __NAMESPACE__."\\Components\\";
            $newClassPath = $classPath;

            if (!isset( $twig_component_ArrayContent['twig_component']['defaults'][$newClassPath] ))
            {
                file_put_contents($twig_component_Filepath, Yaml::dump(array_merge_recursive($twig_component_ArrayContent, ['twig_component' => ['defaults' => [$newClassPath => "@SymfonyUx/"]]]), 4));
            }
        }


        // Generate the YAML bundle configuration file in the project
        // --
        
        (new Configuration)->generateProjectConfig($projectDir);
    }

    public function getContainerExtension(): ?ExtensionInterface
    {
        if (null === $this->extension) {
            $this->extension = new UXExtension();
        }

        return $this->extension;
    }
}