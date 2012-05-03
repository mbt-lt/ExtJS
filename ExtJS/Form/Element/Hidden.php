<?php
/**
 * input type hidden
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */
class ExtJS_Form_Element_Hidden extends Zend_Form_Element_Hidden
{
    
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
            id: '" . $this->getName() ."',
            xtype: 'hiddenfield',
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