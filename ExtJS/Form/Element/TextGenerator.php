<?php
/**
 * ExtJS input text element
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */
class ExtJS_Form_Element_TextGenerator extends ExtJS_Form_Element_Text
{
    
    /**
     * check if element has listeners
     *
     * @return boolean
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function hasListeners()
    {
        return count($this->getAttrib('listeners')) > 0;
    }
    
    /**
     * returns listeners
     *
     * @return array
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function getListeners()
    {
        return $this->getAttrib('listeners');
    }

    
    /**
     * renders ExtJS form element
     *
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function render()
    {
        /* text field content */

        $contentText = "{
            name: '" . $this->getName() . "',
            id: '" . $this->_idPrefix . $this->getName() . "',
            xtype: 'textfield',
            fieldLabel: '" . $this->getDecorator('label')->setElement($this)->getLabel() ."',
            value: '" . $this->getValue() . "'";
         
        if ($this->getAttrib('validator')) {
            $contentText .= ", validator: " . $this->getAttrib('validator');
        }
        
        if ($this->getAttrib('minLength')) {
            $contentText .= ", minLength: " . (int)$this->getAttrib('minLength');
        }
        
        if ($this->getAttrib('maxLength')) {
            $contentText .= ", maxLength: " . (int)$this->getAttrib('maxLength');
        }
         
        if ($this->isRequired()) {
            $contentText .= ", allowBlank: false";
        }
        
        if ($this->getAttrib('labelWidth')) {
            $contentText .= ', labelWidth: ' .  $this->getAttrib('labelWidth');
        }
        
        if ($this->getAttrib('readOnly')) {
            $contentText .= ', readOnly: true';
        }
        
        $contentText .= "}";
        
        /* generator button content */
        
        $contentButton = "{
            xtype: 'button',
            text: 'Generate'";
    
        if ($this->hasListeners()) {
            $contentButton .= ", listeners: {";
            foreach ($this->getListeners() as $key => $function) {
                $contentButton .= $key . ": " . $function . ",";
            }
            $contentButton .= "}";
        }
        
        if ($this->getAttrib('readOnly')) {
            $contentButton .= ',disabled: true';
        }
        
        $contentButton .= "}";
        
        /* whole field */
        $content = "{
            xtype: 'panel',
            layout: 'column',
            border: false,
            frame: false,
            bodyStyle: 'background: transparent;',
            ctCls: 'multicolumn',
        ";
        
        if ($this->getAttrib('width')) {
            $content .= "width: " . $this->getAttrib('width') . ',';
        }
        
        $content .= " items: [$contentText,$contentButton] ";
        $content .= '}';
        
        return $content;
    }
}
