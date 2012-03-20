<?php
/**
 * DatePicker element
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */
class ExtJS_Form_Element_DatePicker extends Zend_Form_Element_Text
{
    
    /**
     * renders ExtJS Form Element content
     *
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function render()
    {
        $content = "{
            xtype: 'datefield',
            fieldLabel: '" . $this->getLabel() . "',
            name: '" . $this->getName() . "',
            format: '" . $this->getFormat() . "'
        }";
        
        return $content;
    }
    
    /**
     * returns date format
     *
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function getFormat()
    {
        return $this->getAttrib('format') ? $this->getAttrib('format') : "m/d/Y";
    }
}