<?php
/**
 * ExtJS form
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */
class ExtJS_Form extends Zend_Form
{
    
    /**
     * renders elements as ExtJS elements
     *
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function render()
    {
        $content = "Ext.create('Ext.form.Panel', {";
        
        $content .= "frame: true";
        
        if ($this->getAction()) {
            $content .= ", url: '" . $this->getAction() . "'";
        }
        
        foreach ($this->getAttribs() as $name => $value) {
            $content .= ", ";
            
            switch ($name) {
                case 'renderTo':
                    $content .= "renderTo: Ext.get('" . (string)$value . "')";
                    break;
                case 'height':
                case 'width':
                    $content .= $name . ": " . (int)$value;
                    break;
                case 'standardSubmit':
                case 'hidden':
                    $content .= $name . ": " . ((boolean)$value === true ? 'true' : 'false');
                    break;
                default:
                    $content .= $name . ": '" . (string)$value . "'";
                    break;
            }
        }
        
        if (!$this->getAttrib('renderTo')) {
            $content .= ", renderTo: Ext.getBody()";
        }
        
        $content .= ", items: [";
        foreach ($this->getElements() as $element) {
            $content .= $element->render() . ",";
        }
        $content .= "],";
        
        $content .= "buttons: [";
        foreach ($this->getButtons() as $button) {
            $content .= "{ text: '" . $button->getLabel() . "',";
            $content .= "itemId: '" . $button->getName() . "',";
              
            if ($button->getAttrib('bind')) {
                $content .= "formBind: " . $button->getAttrib('bind') . ",";
            }
            
            if ($button->getAttrib('disabled') && $button->getAttrib('disabled') === true) {
                $content .= "disabled: true, ";
            }
            
            if ($button->getAttrib('handler')) {
                $content .= "handler: " . $button->getAttrib('handler');
            }
            
            $content .= "},";
        }
        $content .= "]";
            
        $content .= '});';
        
        return $content;
    }
    
    /**
     * get form elements
     *
     * @return array
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function getElements()
    {
        $elements = parent::getElements();

        // strip buttons
        foreach ($elements as $key => $element) {
            if (in_array($element->getType(), array('Zend_Form_Element_Submit', 'Zend_Form_Element_Button'))) {
                unset($elements[$key]);
            }
        }
        
        return $elements;
    }
    
    /**
     * get buttons
     *
     * @return array
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function getButtons()
    {
        $buttons = parent::getElements();
        
        // strip buttons
        foreach ($buttons as $key => $element) {
            if (!in_array($element->getType(), array('Zend_Form_Element_Submit', 'Zend_Form_Element_Button'))) {
                unset($buttons[$key]);
            }
        }
        
        return $buttons;
    }
}