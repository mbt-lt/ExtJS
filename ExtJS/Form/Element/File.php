<?php
/**
 * extjs form element fiel
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */
class ExtJS_Form_Element_File extends Zend_Form_Element_File
{
    
    /**
     * renders as string
     *
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function render()
    {
        $content = "{";
        $content .= "xtype: 'filefield',";
        $content .= "name : '" . $this->getName() . "',";
        $content .= "fieldLabel: '" . $this->getLabel() . "',";
        $content .= "buttonText: 'Browse...'";
        $content .= "}";
        
        return $content;
    }
}