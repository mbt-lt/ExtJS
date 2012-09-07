<?php
/**
 * ExtJS input text element
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */
class ExtJS_Form_Element_Text extends Zend_Form_Element_Text
{

    /**
     * Prefix for field id to avoid duplication
     */
    protected $_idPrefix = '';

    public function __construct($spec, $options = array())
    {
        if (isset($options['idPrefix'])) {
            $this->_idPrefix = $options['idPrefix'];
            unset($options['idPrefix']);
        }
        parent::__construct($spec, $options);
    }
    
    /**
     * renders ExtJS form element
     *
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function render(Zend_View_Interface $view = null)
    {
        if (null !== $view) {
            $this->setView($view);
        }
        
        $content = "{
            fieldLabel: '" . $this->getDecorator('label')->setElement($this)->getLabel() ."',
            name: '" . $this->getName() . "',
            id: '" . $this->_idPrefix . $this->getName() ."',
            xtype: 'textfield',
            value: " . json_encode($this->getValue()) . "";
         
        if ($this->getAttrib('validator')) {
            $content .= ", validator: " . $this->getAttrib('validator');
        }
        
        if ($this->getAttrib('minLength')) {
            $content .= ", minLength: " . (int)$this->getAttrib('minLength');
        }
        
        if ($this->getAttrib('maxLength')) {
            $content .= ", maxLength: " . (int)$this->getAttrib('maxLength');
        }
        
        if ($this->getAttrib('vtype')) {
            $content .= ", vtype: '" . $this->getAttrib('vtype') . "'";
        }
        
        if ($this->getAttrib('labelWidth')) {
            $content .= ', labelWidth: \'' .  $this->getAttrib('labelWidth') . '\'';
        }
         
        if ($this->isRequired()) {
            $content .= ", allowBlank: false";
        }
        
        $content .= "}";
        
        return $content;
    }
}
