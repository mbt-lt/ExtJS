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
        $content = 'Ext.create("Ext.form.Panel", {';
            
        if ($this->getAttrib('id')) {
            $content .= "id: '" . $this->getAttrib('id') . "',";
        }
        
        if ($this->getAttrib('title')) {
            $content .= "title: '" . $this->getAttrib('title') . "',";
        }
        
        if ($this->getAction()) {
            $content .= "url: '" . $this->getAction() . "',";
        }
        
        if ($this->getAttrib('width')) {
            $content .= "width: " . $this->getAttrib('width') . ",";
        }
        
        // decide where to render content
        $content .= "renderTo: ";
        if ($this->getAttrib('renderTo')) {
            $content .= "Ext.get('" . $this->getAttrib('renderTo') . "')";
        } else {
            $content .= "Ext.getBody()";
        }
        $content .= ",";
        
        if ($this->getAttrib('standardSubmit') && $this->getAttrib('standardSubmit') === true) {
            $content .= "standardSubmit: true,";
        }
        
        if ($this->getAttrib('reader')) {
            $content .= "reader: " . $this->getAttrib('reader') . ",";
        }
        
        $content .= "frame: true,";
        
        $content .= "items: [";
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