<?php
/**
 * form display field
 *
 * @category ExtJS
 * @package ExtJS_Form
 * @author aur1mas <aur1mas@devnet.lt>
 */
class ExtJS_Form_Element_Display extends Zend_Form_Element_Text
{
    
    /**
     * renders content
     *
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function render()
    {
        $config = "{
            xtype: 'displayfield',
            fieldLabel: '" . $this->getDecorator('label')->setElement($this)->getLabel() . "',
            name: '" . $this->getName() . "',
            value: " . json_encode($this->getValue()) . "
        ";

        if ($this->getAttrib('id')) {
            $config .= ', id: "' . $this->getAttrib('id') . '"';
        }
        
        if ($this->getAttrib('labelWidth')) {
            $config .= ", labelWidth: " . $this->getAttrib('labelWidth');
        }

        if ($this->getAttrib('disabled') && $this->getAttrib('disabled') === true) {
            $config .= ", disabled: true";
        }

        if ($this->getAttrib('style')) {
            $config .= ", style: " . $this->getAttrib('style');
        }

        if ($this->getAttrib('width')) {
            $config .= ", width: " . (int)$this->getAttrib('width');
        }

        if ($this->getAttrib('hidden') && $this->getAttrib('hidden') === true) {
            $config .= ", hidden: true";
        }

        $config .= "}";

        return $config;
    }
}
