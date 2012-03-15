<?php
/**
 * ExtJS selection model: row model
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */ 
class ExtJS_Selection_RowModel extends ExtJS_Selection_Abstract
{
    
    /**
     * listeners
     *
     * @var array
     */
    protected $_listeners = array();
    
    /**
     * has listeners
     *
     * @return boolean
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function hasListeners()
    {
        return count($this->_listeners) > 0;
    }
    
    /**
     * set listener
     *
     * @param string $name 
     * @param string $function 
     * @return ExtJS_Selection_RowModel
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function setListener($name, $function)
    {
        $this->_listeners[$name] = $function;
        return $this;
    }
    
    /**
     * get listeners
     *
     * @return array
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function getListeners()
    {
        return $this->_listeners;
    }
    
    /**
     * renders selection mode
     *
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function render()
    {
        $content = "Ext.create('Ext.selection.RowModel', {";
        
        $content .= "listeners: {";
        
        foreach ($this->getListeners() as $listener => $function) {
            $content .= $listener . ": " . $function . ",";
        }

        $content .= "}";    
        
        $content .= "})";
        
        return $content;
    }
}