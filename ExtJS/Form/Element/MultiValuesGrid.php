<?php
/**
 * ExtJS submit button
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */
class ExtJS_Form_Element_MultiValuesGrid extends Zend_Form_Element_Text
{
    
    public function render()
    {
        $content .= "{";
        $content .= "text: '" . $this->getLabel() . "'";
        $content .= ",name: '" . $this->getName() . "'";
        $content .= ",xtype: 'multivaluesgrid'";
        
        if ($this->getAttrib('width')) {
            $content .= ",width: " . $this->getAttrib('width');
        }
        
        if ($this->getAttrib('height')) {
            $content .= ",height: " . $this->getAttrib('height');
        }
        
        if ($this->getAttrib('title')) {
            $content .= ",title: '" . $this->getAttrib('title') . "'";
        }
        
        if ($this->getAttrib('columnText')) {
            $content .= ",columnText: '" . $this->getAttrib('columnText') . "'";
        }
        
        if ($this->getAttrib('addText')) {
            $content .= ",addText: '" . $this->getAttrib('addText') . "'";
        }
        
        if ($this->getAttrib('deleteText')) {
            $content .= ",deleteText: '" . $this->getAttrib('deleteText') . "'";
        }
        
        $content .= "}";
        
        return $content;
    }
}