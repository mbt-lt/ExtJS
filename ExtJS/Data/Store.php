<?php
/**
 * ExtJS Data Store
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */
class ExtJS_Data_Store
{
    
    /**
     * store options
     *
     * @var array
     */
    protected $_options = array();
    
    /**
     * store fields
     *
     * @var array
     */
    protected $_fields = array();
    
    /**
     * set Grid options
     *
     * @param array $options 
     * @return ExtJS_Grid
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function setOptions(array $options = array())
    {
        $this->_options = $options;
        return $this;
    }
    
    /**
     * get grid option
     *
     * @param string $key 
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function getOption($key)
    {
        if (isset($this->_options[$key])) {
            return $this->_options[$key];
        }
        
        return null;
    }
    
    /**
     * store fields
     *
     * @param array $fields 
     * @return ExtJS_Data_Store
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function setFields(array $fields)
    {
        $this->_fields = $fields;
        return $this;
    }
    
    /**
     * get fields
     *
     * @return array
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function getFields()
    {
        return $this->_fields;
    }
    
    /**
     * set autoload value
     *
     * @param boolean $default 
     * @return ExtJS_Data_Store
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function setAutoLoad($default = true)
    {
        $this->_options['autoLoad'] = (boolean)$default;
        return $this;
    }
    
    /**
     * check if needs autoLoad data
     *
     * @return boolean
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function getAutoLoad()
    {
        return isset($this->_options['autoLoad']) && $this->_options['autoLoad'] === true;
    }
    
    /**
     * returns JS
     *
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function render()
    {
        $content = "Ext.create('Ext.data.Store', { \r\n";
        
        if ($this->getOption('id')) {
            $content .= "storeId: '" . $this->getOption('id') . "',";
        }
        
        if ($this->getOption('pageSize')) {
            $content .= "pageSize: " . (int)$this->getOption('pageSize') . ",\r\n";
        }
        
        $content .= "fields: [";
        foreach ($this->getFields() as $field) {
            $content .= "'" . $field . "',";
        }
        $content .= "],\r\n";

        if ($this->getAutoLoad()) {
            $content .= "autoLoad: true,\r\n";
        }
        
        if ($this->getOption('remoteSort')) {
            $content .= "remoteSort: true,";
        }
        
        $content .= "proxy: { \r\n";
        $content .= " type: '"
            . (isset($this->_options['proxy']['type']) ? $this->_options['proxy']['type'] : "ajax") . "', \r\n";
        $content .= " url: '" . $this->_options['proxy']['url'] . "', \r\n";
        $content .= " reader: { type: 'json', root: 'result' } \r\n";
        $content .= "} \r\n";
        
        $content .= "}) \r\n";
        
        return $content;
    }
    
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