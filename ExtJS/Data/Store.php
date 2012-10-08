<?php
/**
 * ExtJS Data Store
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */
class ExtJS_Data_Store extends ExtJS_Element_Abstract
{
    
    /**
     * store fields
     *
     * @var array
     */
    protected $_fields = array();
    
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
        
        if ($this->getOption('remoteFilter')) {
            $content .= "remoteFilter: true,";
        }
        
        if ($this->hasOption('proxy')) {
            $content .= "proxy: { \r\n";
            $content .= " type: '"
                . (isset($this->_options['proxy']['type']) ? $this->_options['proxy']['type'] : "ajax") . "', \r\n";
            $content .= " url: '" . $this->_options['proxy']['url'] . "', \r\n";
            $content .= " reader: { type: 'json', root: 'result' } \r\n";
            $content .= "} \r\n";
        } else if ($this->hasOption('data')) {
            $content .= "data: [";
            foreach ($this->getOption('data') as $row) {
                $content .= "{";
                foreach ($row as $key => $value) {
                    $content .= (string)$key . ": '" . htmlspecialchars((string)$value, ENT_QUOTES) . "', ";
                }
                $content .= "},";
            }
            $content .= "]";
        } else {
            throw new ExtJS_Exception("Wrong data type");
        }
        
        if ($this->hasOption('listeners')) {
            $content .= ", listeners: {";
            foreach ($this->getOption('listeners') as $key => $function) {
                $content .= $key . ": " . $function . ",";
            }
            $content .= "}";
        }
        
        $content .= "}) \r\n";
        
        return $content;
    }
}