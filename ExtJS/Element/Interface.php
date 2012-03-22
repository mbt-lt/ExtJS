<?php
interface ExtJS_Element_Interface
{
    
    /**
     * render element
     *
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function render();
    
    /**
     * converts object to string
     *
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function __toString();
}