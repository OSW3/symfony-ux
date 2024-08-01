<?php 
namespace OSW3\UX\Trait;

trait DoNotExposeTrait
{
    /**
     * Expose an empty value to the template
     *
     * @return null
     */
    public function doNotExpose(): null
    {
        return null;
    }
}