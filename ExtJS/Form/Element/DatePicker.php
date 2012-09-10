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
     * Append date format to label.
     * Defaults to false to better future compatibility.
     */
    protected $_appendDateFormatToLabel = false;
    
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
            fieldLabel: '" . $this->getLabelWithDateFormat() . "',
            name: '" . $this->getName() . "',
            format: '" . $this->getFormat() . "',
            value: '" . $this->getValue() . "'
        ";
        
        if ($this->isRequired()) {
            $content .= ", allowBlank: false";
        }
        
        if ($this->getAttrib('labelWidth')) {
            $content .= ', labelWidth: \'' .  $this->getAttrib('labelWidth') . '\'';
        }
        
        if ($this->getAttrib('readOnly')) {
            $content .= ', readOnly: true';
        }
        
        $content .= "}";
        
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

    /**
     * returns field label with date format appended
     *
     * @return string
     */
    public function getLabelWithDateFormat()
    {
        if ($this->_appendDateFormatToLabel) {
            $this->setLabel($this->getLabel() . ' (' . $this->getFormat() . ')');
        }
        $label = $this->getDecorator('label')->setElement($this)->getLabel();
        
        return $label;
    }

    /**
     * Set flag if date format should automatically be appended to field label
     *
     * @param bool $val
     * @return ExtJS_Form_Element_DatePicker
     */
    public function appendDateFormatToLabel($val = true)
    {
        $this->_appendDateFormatToLabel = $val;
        return $this;
    }

}
