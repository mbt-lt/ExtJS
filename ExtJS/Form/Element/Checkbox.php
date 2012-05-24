<?php
/**
 * ExtJS Form Element Checkbox
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */
class ExtJS_Form_Element_Checkbox extends Zend_Form_Element_Checkbox
{
    
    /**
     * renders content for form
     *
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function render()
    {
        $content = "{
            xtype: 'checkboxfield',
            boxLabel: '" . $this->getLabel() . "',
            name: '" . $this->getName() . "'";
            
        if ($this->getAttrib('disabled') && $this->getAttrib('disabled') === true) {
            $content .= ", disabled: true";
        }
            
        $content .= "}";
        
        return $content;
    }
}