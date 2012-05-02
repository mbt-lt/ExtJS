<?php
/**
 * renders Textarea element
 *
 * @package ExtJS_Form
 * @author aur1mas <aur1mas@devnet.lt>
 */
class ExtJS_Form_Element_Textarea extends Zend_Form_Element_Textarea
{
    
    /**
     * renders element text
     *
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function render()
    {
        return "{
            xtype: 'textareafield',
            grow: true,
            name: '" . $this->getName() ."',
            fieldLabel: '" . $this->getLabel() . "'
        }";
    }
}