<?php 
namespace OSW3\UX\Twig\Runtime;

use Doctrine\Persistence\ManagerRegistry;
use OSW3\Ux\DependencyInjection\Configuration;
use Twig\Extension\RuntimeExtensionInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class AnnouncementExtensionRuntime implements RuntimeExtensionInterface
{
    public function __construct(
        private ManagerRegistry $doctrine,
        private ParameterBagInterface $parameters
    ) {}

    public function getAnnouncementMessages(): array 
    {
        $entity = $this->parameters->get(Configuration::NAME)['components']['announcement']['entity'];

        if ($entity === null) {
            return [];
        }

        $repository = $this->doctrine->getRepository($entity);
        $entities   = $repository->findAll();
        return array_map(fn($entity) => $entity->{'get' . ucfirst('message')}(), $entities);
    }
}