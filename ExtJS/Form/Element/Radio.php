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
            xtype: 'fieldcontainer',
            defaultType: 'radiofield',
            layout: 'hbox',
            fieldLabel: '" . $this->getLabel() . "',";
        
        $content .= "items: [";    
        foreach ($this->getMultiOptions() as $key => $value) {
            $content .= "{
                boxLabel: '" . $value . "',
                name: '" . $this->getName() . "',
                inputValue: '" . $key ."'
            },";
        }
        $content .= "]}";
        
        return $content;
    }
}