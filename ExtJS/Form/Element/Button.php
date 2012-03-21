<?php
/**
 * ExtJS submit button
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */
class ExtJS_Form_Element_Button extends Zend_Form_Element_Button
{
    
    public function render()
    {
        $content = "{";
        $content .= "text: '" . $this->getLabel() . "',";
        $content .= "itemId: '" . $this->getName() . "'";
        
        if ($this->getAttrib('bind')) {
            $content .= ", formBind: " . $this->getAttrib('bind');
        }
        
        if ($this->getAttrib('disabled') && $this->getAttrib('disabled') === true) {
            $content .= ', disabled: true';
        }
        
        if ($this->getAttrib('handler')) {
            $content .= ", handler: " . $this->getAttrib('handler');
        }
        
        $content .= "}";
        return $content;
    }
}