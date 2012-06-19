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
                Ext.Msg.alert('" . $this->_successTitle . "', action.result.msg);
            },
            failure: function(form, action) {
                Ext.Msg.alert('" . $this->_failureTitle . "', action.result.msg);
            }
        }";
    }
    
}
