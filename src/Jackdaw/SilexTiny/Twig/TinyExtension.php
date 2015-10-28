<?php
namespace Jackdaw\SilexTiny\Twig;

use ZackKitzmiller\Tiny;

/**
 * A Tiny extension for Twig.
 * @author jackjackdaw
 *
 */
class TinyExtension extends \Twig_Extension
{
    /**
     * The tiny class.
     * @var ZackKitzmiller\Tiny
     */
    protected $tiny;

    /**
     *
     * @param Tiny $tiny
     */
    public function __construct(Tiny $tiny)
    {
        $this->tiny = $tiny;
    }

    /**
     * Add the tiny filter.
     * @return multitype:\Twig_SimpleFilter
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('tiny', array($this, 'tiny')),
        );
    }

    /**
     * Do the tiny conversion.
     * @param string $text
     */
    public function tiny($id)
    {
        return $this->tiny->to($id);
    }

    /**
     * Get the extension name.
     * @return string
     */
    public function getName()
    {
        return 'tiny';
    }
}
