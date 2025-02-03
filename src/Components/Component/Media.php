<?php 
namespace OSW3\UX\Components\Component;

use OSW3\UX\Components\Component;
use OSW3\UX\Trait\AttributeIdTrait;
use OSW3\UX\Trait\DoNotExposeTrait;
use OSW3\UX\Trait\AttributeClassTrait;
use OSW3\UX\Trait\AttributeDatasetTrait;
use Symfony\UX\TwigComponent\Attribute\PreMount;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(template: '@SymfonyUx/media/base.twig')]
class Media extends Component
{
    public const NAME = "media";
    
    use DoNotExposeTrait;
    use AttributeIdTrait;
    use AttributeClassTrait;
    use AttributeDatasetTrait;

    #[ExposeInTemplate(name: 'alt')]
    public string|null $alt;

    #[ExposeInTemplate(name: 'autoplay')]
    public string $autoplay;

    #[ExposeInTemplate(name: 'controls')]//, getter: 'controls')]
    public string $controls;

    #[ExposeInTemplate(name: 'description')]
    public string|null $description;

    /**
     * Downloadable media
     * Add the download link
     *
     * @var boolean
     */
    #[ExposeInTemplate(name: 'download')]
    public bool $download;

    #[ExposeInTemplate(name: 'figure', getter: 'isFigure')]
    public bool $figure;

    #[ExposeInTemplate(name: 'inline')]
    public bool $inline;

    /**
     * Lazy loading media
     * applicable on "image" media
     *
     * @var boolean
     */
    #[ExposeInTemplate(name: 'lazy')]
    public bool $lazy;

    #[ExposeInTemplate(name: 'loop')]
    public string $loop;

    #[ExposeInTemplate(name: 'muted')]
    public string $muted;

    #[ExposeInTemplate(name: 'orientation')]
    public string $orientation;

    #[ExposeInTemplate(name: 'playsinline')]
    public string $playsinline;

    #[ExposeInTemplate(getter: 'doNotExpose')]
    public string|array|null $poster;

    #[ExposeInTemplate(name: 'preload')]
    public string $preload;
    
    #[ExposeInTemplate(name: 'style', getter: 'fetchStyle')]
    public string|null $style;

    #[ExposeInTemplate(name: 'src', getter: 'fetchSrc')]
    public string|array $src;

    #[ExposeInTemplate(name: 'title')]
    public string|null $title;

    #[ExposeInTemplate(name: 'titleLevel', getter: 'fetchTitleLevel')]
    public int|float|string $titleLevel;

    #[ExposeInTemplate(name: 'type')]
    public string $type;

    #[ExposeInTemplate(name: 'volume')]
    public int|string|null $volume;
    
    #[ExposeInTemplate(getter: 'doNotExpose')]
    public string|null $width;













    #[ExposeInTemplate(getter: 'doNotExpose')]
    public string|array|null $cover;

    #[ExposeInTemplate(name: 'illustration', getter: 'fetchIllustration')]
    public string|null $illustration;
    
    #[ExposeInTemplate(name: 'illustrationsSet')]
    public array $illustrationsSet;



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

        $resolver->setDefault('alt', null);
        $resolver->setAllowedTypes('alt', ['string', 'null']);

        $resolver->setDefault('autoplay', 'no');
        $resolver->setAllowedValues('autoplay', ['yes', 'no']);
        $resolver->setAllowedTypes('autoplay', ['string']);

        $resolver->setDefault('controls', 'yes');
        $resolver->setAllowedValues('controls', ['yes', 'no']);
        $resolver->setAllowedTypes('controls', ['string']);

        $resolver->setDefault('description', null);
        $resolver->setAllowedTypes('description', ['string', 'null']);

        $resolver->setDefault('download', false);
        $resolver->setAllowedTypes('download', ['bool']);

        $resolver->setDefault('figure', false);
        $resolver->setAllowedTypes('figure', ['bool']);

        $resolver->setDefault('inline', false);
        $resolver->setAllowedTypes('inline', ['bool']);

        $resolver->setDefault('lazy', false);
        $resolver->setAllowedTypes('lazy', ['bool']);

        $resolver->setDefault('loop', 'no');
        $resolver->setAllowedValues('loop', ['yes', 'no']);
        $resolver->setAllowedTypes('loop', ['string']);

        $resolver->setDefault('muted', 'yes');
        $resolver->setAllowedValues('muted', ['yes', 'no']);
        $resolver->setAllowedTypes('muted', ['string']);

        $resolver->setDefault('orientation', 'portrait');
        $resolver->setAllowedValues('orientation', ['portrait', 'landscape']);
        $resolver->setAllowedTypes('orientation', ['string']);

        $resolver->setDefault('playsinline', 'yes');
        $resolver->setAllowedValues('playsinline', ['yes', 'no']);
        $resolver->setAllowedTypes('playsinline', ['string']);

        $resolver->setDefault('poster', null);
        $resolver->setAllowedTypes('poster', ['string', 'array', 'null']);

        $resolver->setDefault('preload', 'auto');
        $resolver->setAllowedValues('preload', ['auto', 'metadata', 'none']);
        $resolver->setAllowedTypes('preload', ['string']);

        $resolver->setRequired('src');
        $resolver->setAllowedTypes('src', ['string', 'array']);

        $resolver->setDefault('title', null);
        $resolver->setAllowedTypes('title', ['string', 'null']);

        $resolver->setDefault('titleLevel', 3);
        $resolver->setAllowedTypes('titleLevel', ['integer', 'float', 'string']);

        $resolver->setDefault('type', 'unknown');
        $resolver->setAllowedTypes('type', ['string']);

        $resolver->setDefault('volume', null);
        $resolver->setAllowedTypes('volume', ['integer','string','null']);

        $resolver->setDefault('width', null);
        $resolver->setAllowedTypes('width', ['string', 'null']);









        $resolver->setDefault('cover', null);
        $resolver->setAllowedTypes('cover', ['string', 'array', 'null']);

        $resolver->setDefault('illustrationsSet', []);
        $resolver->setAllowedTypes('illustrationsSet', ['array']);

        return $resolver->resolve($data) + $data;
    }

    public function fetchSrc(): array|string {

        $sources = $this->generateSrcset($this->src);

        // dump($sources);
        return $sources;

        // if (count($sources) > 1) {
        //     $this->srcset = $sources;
        // }
        
        // $defaultSources = array_filter($sources, fn($source) => isset($source['default']) && $source['default']);
        // sort($defaultSources);

        // return $defaultSources[0]['src'] ?? end($sources)['src'];
    }

    private function generateSrcset(string|array $sources): array {

        $breakpoints = $this->config['layout']['breakpoints']['base'];
        // dump($breakpoints);

        // convert: src string --> src array
        $sources = !is_array($sources) ? [[
            'src' => $sources,
            'default' => true,
        ]] : $sources;

        // Convert list of src on a formated array
        foreach ($sources as $key => $source) {
            if (gettype($source) === 'string') {
                $sources[$key] = ['src' => $source];
            }
        }

        // Set media type
        foreach ($sources as $key => $source) {
            $type = 'unknown';
            $extension = pathinfo($source['src'], PATHINFO_EXTENSION);

            $mediaTypes = [
                'image' => ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'],
                // 'audio' => ['mp3', 'wav', 'ogg', 'flac'],
                'audio' => ['mp3', 'wav', 'ogg', 'flac', 'm3u', 'opus', 'weba', 'acc', 'm4a'],
                'video' => ['mp4', 'webm', 'ogg', 'mov', 'avi'],
                'pdf'   => ['pdf']
            ];

            foreach ($mediaTypes as $mediaType => $extensions) {
                if (in_array(strtolower($extension), $extensions, true)) {
                    $type = $mediaType;
                    break;
                }
            }

            $sources[$key]['type'] = $type;
        }


        // format the breakpoint
        if ($type === 'image') {
            foreach ($sources as $key => $source) {
                if (isset($source['breakpoint'])) {
                    $value = $source['breakpoint'];
    
                    // find the breakpoint in the list of config breakpoints
                    if (isset($breakpoints[$value])) {
                        $value = $breakpoints[$value]['breakpoint'];
                    }
    
                    $value = (int) $value;
                    $sources[$key]['breakpoint'] = $value;
                }
            }
        }

        if (array_filter($sources, fn($source) => isset($source['breakpoint']))) {
            usort($sources, fn($a, $b) => $a['breakpoint'] - $b['breakpoint']);
        }


        $this->checkType($sources);

        return $sources;
    }

    private function checkType(array $sources): void {
        $type = null;

        foreach ($sources as $source) {
            if ($type === null) {
                $type = $source['type'];
            }

            if ($type !== $source['type']) {
                throw new \Exception("All sources in the set must have the same type");
            }
        }

        $this->type = $type;
    }

    public function isFigure(): bool {
        return !empty($this->title) || !empty($this->description);
    }

    public function fetchTitleLevel(): string {
        return "h{$this->titleLevel}";
    }

    public function fetchClass(): string
    {
        $classList = $this->classList();

        if ($this->inline) {
            $classList[] = "{$this->getComponentClassname()}-inline";
        }

        return implode(" ", $classList);
    }

    public function fetchIllustration(): string|null {
        if ($this->type === 'video' || $this->type === 'audio') {
            // return $this->poster ?? $this->cover;

            $value = $this->poster ?? $this->cover;

            if ($value) {
                $sources = $this->generateSrcset($value);
    
                if (count($sources) > 1) {
                    $this->illustrationsSet = $sources;
                }
        
                $defaultSources = array_filter($sources, fn($source) => isset($source['default']) && $source['default']);
                sort($defaultSources);
    
                return $defaultSources[0]['src'] ?? end($sources)['src'];
            }
        }

        return null;
    }


    // public function controls(): string {
    //     return $this->type === 'pdf' && $this->controls === 'yes' ? 'no' : 'yes';
    // }

    // public function loop(): bool {
    //     return $this->loop === 'yes';
    // }

    // public function autoplay(): bool {
    //     return $this->autoplay === 'yes';
    // }

    // public function muted(): bool {
    //     return $this->muted === 'yes';
    // }

    // public function playsinline(): bool {
    //     return $this->playsinline === 'yes';
    // }

    public function fetchStyle() {
        $styles = [];

        if ($this->width) {
            $styles[] = "--{$this->getComponentClassname()}-width: {$this->width}";
        }

        return implode(";", $styles);
    }
}