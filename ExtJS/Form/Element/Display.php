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
            fieldLabel: '" . $this->getLabel() . "',
            name: '" . $this->getName() . "',
            value: '" . $this->getValue() . "'
        ";

        if ($this->getAttrib('id')) {
            $config .= ', id: "' . $this->getAttrib('id') . '"';
        }

        $config .= "}";

        return $config;
    }
}
