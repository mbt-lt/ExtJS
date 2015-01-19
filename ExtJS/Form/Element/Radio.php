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
        $width = $this->getAttrib('labelWidth') ? ($this->getAttrib('labelWidth') + 200) : 555;
        
        $content = "{";
        $content .= "
            xtype: 'radiogroup',
            layout: 'hbox',
            width: {$width},
            fieldLabel: '" . $this->getDecorator('label')->setElement($this)->getLabel() . "',";
        
        if ($this->isRequired()) {
            $content .= "allowBlank: false,";
        }
        
        if ($this->getAttrib('labelWidth')) {
            $content .= "labelWidth: " .  $this->getAttrib('labelWidth') . ",";
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

            if ($this->getAttrib('readOnly')) {
                $content .= ', readOnly: true';
            }

            $content .= "},";
        }
        $content .= "]}";
        
        return $content;
    }
}