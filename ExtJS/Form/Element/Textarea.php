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
        $content = "{
            xtype: 'textareafield',
            grow: true,
            name: '" . $this->getName() ."',
            fieldLabel: '" . $this->getDecorator('label')->setElement($this)->getLabel() . "',
            value: '" . $this->getValue() . "'
        ";
        
        if ($this->getAttrib('labelWidth')) {
            $content .= ', labelWidth: \'' .  $this->getAttrib('labelWidth') . '\'';
        }
        
        if ($this->getAttrib('readOnly')) {
            $content .= ', readOnly: true';
        }
        
        $content .= "}";
        
        return $content;
    }
}