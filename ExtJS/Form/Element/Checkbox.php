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
            boxLabel: '" . $this->getDecorator('label')->setElement($this)->getLabel() . "',
            name: '" . $this->getName() . "'
        ";
        
        if ($this->getAttrib('boxLabelCls')) {
            $content .= ', boxLabelCls: "' . $this->getAttrib('boxLabelCls') . '"';
        }

        if ($this->getAttrib('baseCls')) {
            $content .= ', baseCls: "' . $this->getAttrib('baseCls') . '"';
        }

        if ($this->getAttrib('labelWidth')) {
            $content .= ', labelWidth: ' .  $this->getAttrib('labelWidth');
        }

        if ($this->getAttrib('disabled') && $this->getAttrib('disabled') === true) {
            $content .= ", disabled: true";
        }
        
        if ($this->getAttrib('checked')) {
            $content .= ', checked: true';
        }
        
        if ($this->getAttrib('style')) {
            $content .= ", style: " . $this->getAttrib('style');
        }
        
        if ($this->getAttrib('handler')) {
            $content .= ", handler: " . $this->getAttrib('handler');
        }

        if ($this->getAttrib('id')) {
            $content .= ", id: '" . $this->getAttrib('id') . "'";
        }
        
        if ($this->getAttrib('readOnly')) {
            $content .= ', readOnly: true';
        }
        
        $content .= "}";
        
        return $content;
    }
}
