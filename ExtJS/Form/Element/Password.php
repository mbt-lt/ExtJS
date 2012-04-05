<?php
/**
 * ExtJS input password element
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */
class ExtJS_Form_Element_Password extends Zend_Form_Element_Password
{    
    
    /**
     * renders ExtJS form element
     *
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function render()
    {
        $content .= "{
            fieldLabel: '" . $this->getLabel() ."',
            name: '" . $this->getName() . "',
            inputType: 'password',
            xtype: 'textfield'";
         
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