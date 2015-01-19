<?php
/**
 * multiselect combobox.
 *
 * @see https://github.com/kveeiv/extjs-boxselect
 * @package ExtJS_UX
 * @author aur1mas <aur1mas@devnet.lt>
 */
class ExtJS_UX_Form_Element_BoxSelect extends Zend_Form_Element
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
     * renders element as string
     *
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function render()
    {
        if (is_array($this->getValue())) {
            $value = Zend_Json::encode($this->getValue());
        } else {
            $value = Zend_Json::encode([$this->getValue()]);
        }
        $content = "{
            name: '" . $this->getName() . "',
            xtype: 'boxselect',
            fieldLabel: '" . $this->getLabel() . "',
            displayField: '" . $this->getDisplayField() . "',
            valueField: 'id',
            store: " . $this->getStore() . ",
            queryMode: 'remote',
            value: '" . $value . "',
            encodeSubmitValue: true,
            readOnly: " . ($this->getAttrib('readOnly') ? 'true' : 'false') . ",
            minChars: 3
        ";

        if ($this->getAttrib('id')) {
            $content .= ", id: '" . (string)$this->getAttrib('id') . "'";
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
}