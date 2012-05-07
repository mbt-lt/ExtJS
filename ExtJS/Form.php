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
                case 'onEnter':
                    $content .= "listeners: {
                        afterRender: function(form, options){
                            this.keyNav = Ext.create('Ext.util.KeyNav', this.el, {
                                enter: function() {" . $value . "},
                                scope: this
                            });
                         }
                    }";
                    break;
                case 'defaults':
                    $content .= "defaults: " . (string)$value;
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
        
        if ($this->hasSubForms()) {
            $iterator = new ArrayIterator($this->getSubForms());
            while($iterator->valid()) {
                $
            }
            foreach ($this->getSubForms() as $subForm) {
                $content .= "{";
                if ($subForm->getAttrib('width')) {
                    $content .= "width: " . (int)$subForm->getAttrib('wdith') . ",";
                }
                $content .= $subForm->render() . "},";
            }
        }
        
        if ($this->hasElements()) {
            $iterator = new ArrayIterator($this->getElements());
            while ($iterator->valid()) {
                $element = $iterator->current();
                $content .= $element->render();
                if ($iterator->valid()) {
                    $content .= ",";
                }
            }
        }

        $content .= "],";
        
        $content .= "buttons: [";
        
        $iterator = new ArrayIterator($this->getButtons());
        while ($iterator->valid()) {
            $button = $iterator->current();
            
            $content .= "{ text: '" . $button->getLabel() . "'";
            $content .= ",itemId: '" . $button->getName() . "'";
              
            if ($button->getAttrib('bind')) {
                $content .= ",formBind: " . $button->getAttrib('bind');
            }
            
            if ($button->getAttrib('disabled') && $button->getAttrib('disabled') === true) {
                $content .= ",disabled: true";
            }
            
            if ($button->getAttrib('handler')) {
                $content .= ",handler: " . $button->getAttrib('handler');
            }
            
            if ($button->getAttrib('hidden') && $button->getAttrib('hidden') === true) {
                $content .= ",hidden: true";
            }
            
            $content .= "}";
            
            $iterator->next();
            
            if ($iterator->valid()) {
                $content .= ",";
            }
            
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
    
    /**
     * check if form has subforms
     *
     * @return boolean
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function hasSubForms()
    {
        return count($this->getSubForms()) > 0;
    }
    
    /**
     * checks if form has elements
     *
     * @return boolean
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function hasElements()
    {
        return count($this->getElements()) > 0;
    }
}