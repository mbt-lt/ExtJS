<?php

/**
 * Default submit handler
 *
 */
class ExtJS_Handler_Submit extends ExtJS_Handler
{
    
    /**
     * Class which handles submit action
     * @var string
     */
    protected $_submitActionClass = 'ExtJS_Action_Submit';
    
    protected function _getBody()
    {
        $submitAction = new $this->_submitActionClass();
        $submitAction->setOption('submitUrl', $this->getOption('submitUrl'));
        
        $body = $submitAction->render();
        
        return $body;
    }
    
}
