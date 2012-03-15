<?php
/**
 * selection model
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */
abstract class ExtJS_Selection_Abstract
{
    
    /**
     * @see this#render
     * @return void
     * @author aur1mas
     */
    public function __toString()
    {
        return $this->render();
    }
}