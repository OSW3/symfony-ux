<?php 
namespace OSW3\UX;

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Filesystem\Path;
use OSW3\UX\DependencyInjection\Configuration;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

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
            $classPath = "OSW3\\UX\\Components\\";
            $newClassPath = $classPath;

            if (!isset( $twig_component_ArrayContent['twig_component']['defaults'][$newClassPath] ))
            {
                file_put_contents($twig_component_Filepath, Yaml::dump(array_merge_recursive($twig_component_ArrayContent, ['twig_component' => ['defaults' => [$newClassPath => "@Ux/"]]]), 4));
            }
        }


        // Create Search.yaml config
        // --
        
        (new Configuration)->generateProjectConfig($projectDir);
    }
}