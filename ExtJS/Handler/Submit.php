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
    
    /**
     * Submit action
     * @var ExtJS_Action_Submit
     */
    protected $_submitAction = null;
    
    protected function _getBody()
    {
        $submitAction = $this->getSubmitAction();
        
        $body = $submitAction->render();
        
        return $body;
    }
    
    /**
     * Get submit action
     * 
     * @return ExtJS_Action_Submit
     */
    public function getSubmitAction()
    {
        if ($this->_submitAction == null) {
            $this->_submitAction = new $this->_submitActionClass();
        }
                
        return $this->_submitAction;
    }
    
}
