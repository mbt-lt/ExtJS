<?php
/**
 * html editor (WYSIWYG)
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */
class ExtJS_Form_Element_Html extends Zend_Form_Element_Textarea
{
    public function render()
    {
        return "{
            xtype: 'htmleditor',
            name: '" . $this->getName() . "',
            fieldLabel: '" . $this->getLabel() . "'
        }";
    }
}