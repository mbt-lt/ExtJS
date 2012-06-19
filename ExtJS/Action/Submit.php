<?php

/**
 * Default submit action
 *
 */
class ExtJS_Action_Submit extends ExtJS_Action_Abstract
{
    
    /**
     * Message displayed while saving
     * @var string
     */
    protected $_waitMsg = 'Saving';
    
    /**
     * Success messagebox title
     * @var string
     */
    protected $_successTitle = 'Success';
    
    /**
     * Failure messagebox title
     * @var string
     */
    protected $_failureTitle = 'Failure';

    /**
     * Custom callback function on submit success
     * @var string
     */
    protected $_customSuccessCallback = null;
    
    /**
     * Custom callback function on submit failure
     * @var string
     */
    protected $_customFailureCallback = null;
    
    
    protected function _getFunction()
    {
        return "this.up('form').getForm().submit";
    }
    
    protected function _getFunctionParams()
    {
        return "{
            url: '" . $this->getOption('submitUrl') . "',
            waitMsg: '" . $this->_waitMsg . "',
            success: function(form, action) {
                " . $this->_getSuccessCallback() . "
            },
            failure: function(form, action) {
                " . $this->_getFailureCallback() . "
            }
        }";
    }
    
    /**
     * Override default callback for successful submit
     * @param string $callback
     */
    public function setSuccessCallback($callback)
    {
        $this->_customSuccessCallback = $callback;
    }
    
    /**
     * Override default callback for failed submit
     * @param string $callback
     */
    public function setFailureCallback($callback)
    {
        $this->_customFailureCallback = $callback;
    }
    
    /**
     * Success callback
     * 
     * @return string
     */
    protected function _getSuccessCallback()
    {
        return $this->_customSuccessCallback ?: "Ext.Msg.alert('" . $this->_successTitle . "', action.result.msg);";
    }
    
    /**
     * Failure callback
     * 
     * @return string
     */
    protected function _getFailureCallback()
    {
        return $this->_customFailureCallback ?: "
            if (action.failureType == 'server') {
                Ext.Msg.alert('" . $this->_failureTitle . "', action.result.msg);
            }
        ";
    }
    
}
