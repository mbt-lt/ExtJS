<?php
/**
 * autocomplete element
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */
class ExtJS_Form_Element_Autocomplete extends Zend_Form_Element
{
    
    /**
     * data store
     *
     * @var mixed
     */
    protected $_store;
    
    /**
     * set store
     *
     * @param mixed $store 
     * @return ExtJS_Form_Element_Autocomplete
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function setStore($store)
    {
        $this->_store = $store;
        return $this;
    }
    
    /**
     * get store
     *
     * @return mixed
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function getStore()
    {
        return $this->_store;
    }
    
    /**
     * renders element
     *
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function render()
    {
        $content = "{
            name: '" . $this->getName() . "',
            xtype: 'combo',
            fieldLabel: '" . $this->getLabel() . "',
            displayField: '" . $this->getDisplayField() . "',
            valueField: '" . $this->getValueField() . "',
            store: " . $this->getStore() . ",
            queryMode: 'remote',
            minChars: 2,
            hasTrigger: true,
            forceSelection: true,
            typeAhead: true,
            value: '" . $this->getValue() . "'";
            
        if ($this->getAttrib('id')) {
            $content .= ", id: '" . (string)$this->getAttrib('id') . "'";
        }
        
        if ($this->getAttrib('disabled') && $this->getAttrib('disabled') === true) {
            $content .= ", disabled: true";
        }
        
        if ($this->getAttrib('labelWidth')) {
            $content .= ', labelWidth: \'' .  $this->getAttrib('labelWidth') . '\'';
        }
        
        if ($this->getAttrib('readonly') && $this->getAttrib('readonly') === true) {
            $content .= ", readOnly: true";
        }
        
        if ($this->getAttrib('width')) {
            $content .= ", width: " . (int)$this->getAttrib('width');
        }
 
        if ($this->getAttrib('queryParam')) {
            $content .= ", queryParam: '" . (string)$this->getAttrib('queryParam') . "'";
        }
        
        if ($this->isRequired()) {
            $content .= ", allowBlank: false";
        }
        
        if ($this->getAttrib('listeners')) {
            $content .= ", listeners: {";
            foreach ($this->getAttrib('listeners') as $key => $function) {
                $content .= $key . ": " . $function . ",";
            }
            $content .= "}";
        }

        
        $content .= "}";
        
        return $content;
    }
    
    /**
     * returns display field
     *
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function getDisplayField()
    {
        return $this->getAttrib('displayField') ? $this->getAttrib('displayField') : $this->getName();
    }

    /**
     * returns display field
     *
     * @return string
     */
    public function getValueField()
    {
        return $this->getAttrib('valueField') ? $this->getAttrib('valueField') : 'id';
    }

}

