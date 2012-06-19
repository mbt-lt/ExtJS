<?php

/**
 * Handler which may be attached to ExtJS interface elements
 *
 */
class ExtJS_Handler extends ExtJS_Element_Abstract
{
    
    public function render()
    {
        $content = 'function() {';
        
        $content .= $this->_getBody();
        
        $content .= '}';
        
        return $content;
    }
    
    /**
     * Returns function body of handler
     * 
     * @return string
     */
    protected function _getBody()
    {
        return '';
    }
    
}
