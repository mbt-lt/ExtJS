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
            inputType: '" . $this->getName() . "',
            id: '" . $this->getName() ."',
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