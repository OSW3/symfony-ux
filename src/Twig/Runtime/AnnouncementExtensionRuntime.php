<?php 
namespace OSW3\UX\Twig\Runtime;

use Doctrine\Persistence\ManagerRegistry;
use Twig\Extension\RuntimeExtensionInterface;
use OSW3\UX\DependencyInjection\Configuration;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class AnnouncementExtensionRuntime implements RuntimeExtensionInterface
{
    public function __construct(
        private ParameterBagInterface $parameters,
        private ?ManagerRegistry $doctrine = null,
    ) {}

    public function getAnnouncementMessages(): array 
    {
        $entity = $this->parameters->get(Configuration::NAME)['components']['announcement']['entity'];

        if ($entity === null && $this->doctrine === null) {
            return [];
        }

        $repository = $this->doctrine->getRepository($entity);
        $entities   = $repository->findAll();

        \usort($entities, function ($a, $b) {
            $orderA = $a->getOrder();
            $orderB = $b->getOrder();

            return $orderA <=> $orderB;
        });

        return \array_map(fn($entity) => $entity->{'get' . \ucfirst('message')}(), $entities);
    }
}