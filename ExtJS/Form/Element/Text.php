<?php
/**
 * ExtJS input text element
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */
class ExtJS_Form_Element_Text extends Zend_Form_Element_Text
{

    /**
     * Prefix for field id to avoid duplication
     */
    protected $_idPrefix = '';

    public function __construct($spec, $options = array())
    {
        if (isset($options['idPrefix'])) {
            $this->_idPrefix = $options['idPrefix'];
            unset($options['idPrefix']);
        }
        parent::__construct($spec, $options);
    }
    
    /**
     * renders ExtJS form element
     *
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function render()
    {
        $content = "{
            fieldLabel: '" . $this->getLabel() ."',
            name: '" . $this->getName() . "',
            id: '" . $this->_idPrefix . $this->getName() ."',
            xtype: 'textfield',
            value: '" . $this->getValue() . "'";
         
         if ($this->getAttrib('validator')) {
             $content .= ", validator: " . $this->getAttrib('validator');
         }
         
        if ($this->isRequired()) {
            $content .= ", allowBlank: false";
        }
        
        $content .= "}";
        
        return $content;
    }
}
