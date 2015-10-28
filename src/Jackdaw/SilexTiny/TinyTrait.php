<?php
namespace Jackdaw\SilexTiny;

/**
 * A trait for Tiny library by Zack Kitzmiller.
 * @author jackjackdaw
 *
 */
trait TinyTrait
{
    /**
     * Convert the id. E.g.
     *
     * echo $this->to(5);
     * // E
     *
     * @param mixed $id
     * @return string
     */
    public function to($id)
    {
        return $this['tiny']->to($id);
    }

    /**
     * Conver the string back to an id.
     * @param string $str
     * @return int
     */
    public function from($str)
    {
        return $this['tiny']->from($str);
    }
}
