<?php
/**
 * ExtJS radio button
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */
class ExtJS_Form_Element_Radio extends Zend_Form_Element_Radio
{
    
    public function render()
    {
        $content = "{";
        $content .= "
            xtype: 'radiogroup',
            layout: 'hbox',
            width: 255,
            fieldLabel: '" . $this->getDecorator('label')->setElement($this)->getLabel() . "',";
        
        if ($this->isRequired()) {
            $content .= "allowBlank: false,";
        }
        
        $content .= "items: [";    
        foreach ($this->getMultiOptions() as $key => $value) {
            $content .= "{
                boxLabel: '" . $value . "',
                name: '" . $this->getName() . "',
                inputValue: '" . $key ."',
                checked: '" . ($key === $this->getValue() ? true : false) . "'";
                
            if ($this->getAttrib('handler')) {
                $content .= ", handler: " . $this->getAttrib('handler') . ",";
            }

            $content .= "},";
        }
        $content .= "]}";
        
        return $content;
    }
}