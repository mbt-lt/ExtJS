<?php
/**
 * ExtJS Grid paging toolbar
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */
class ExtJS_Grid_PagingToolbar
{
    
    /**
     * ExtJS Grid Store
     *
     * @var ExtJS_Grid_Store
     */
    protected $_store;
    
    /**
     * adds store
     *
     * @param mixed <ExtJS_Data_Store|string> $store    store can be object or just store id if it's already created
     * @return ExtJS_Grid_PagingToolbar
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function setStore($store)
    {
        $this->_store = $store;
        return $this;
    }
    
    /**
     * get store object
     *
     * @return ExtJS_Data_Store
     * @author aur1mas <aur1mas@devnet.lt>
     * @throws ExtJS_Exception
     */
    public function getStore()
    {
        // store can be string OR object
        if ($this->_store instanceof ExtJS_Data_Store) {
            return $this->_store;
        } else if (mb_strlen($this->_store, 'utf-8') > 0) {
            return "'" . $this->_store . "'";
        }
        
        throw new ExtJS_Exception("Store not found");
    }
    
    /**
     * renders grid JS
     *
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function render()
    {
        $content = "Ext.create('Ext.PagingToolbar', {";
        $content .= "store: " . $this->getStore() . " ,";
        $content .= "displayInfo: true";
        $content .= "})";
        
        return $content;   
    }
    
    /**
     * @see render()
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function __toString()
    {
        return $this->render();
    }
}