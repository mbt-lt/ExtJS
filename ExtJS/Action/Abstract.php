<?php

/**
 * Handler which may be attached to ExtJS interface elements
 *
 */
abstract class ExtJS_Action_Abstract extends ExtJS_Element_Abstract
{
    
    public function render()
    {
        $content = $this->_getFunction();
        $content .= '(';
        $content .= $this->_getFunctionParams();
        $content .= ');';
        
        return $content;
    }
    
    /**
     * Get action function
     * 
     * @return string
     */
    abstract protected function _getFunction();
    
    /**
     * Get action function parameters
     * 
     * @return string
     */
    protected function _getFunctionParams()
    {
        return '';
    }
    
}
