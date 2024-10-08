<?php 
namespace OSW3\UX\Components\Ux;

use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use OSW3\UX\Components\AbstractComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: '@SymfonyUx/thumbnail/base.twig')]
final class Thumbnail extends AbstractComponent
{
    public const NAME = "thumbnail";
    
    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;

    #[PreMount]
    public function preMount(array $data): array
    {
        // $options  = $this->getConfig();
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);

        $this
            ->idResolver($resolver)
            ->classResolver($resolver)
            ->datasetResolver($resolver)
        ;
        return $resolver->resolve($data) + $data;
    }
}