<?php
/**
 * Grid TopBar element
 *
 * @package TopBar
 * @author aur1mas <aur1mas@devnet.lt>
 */
class ExtJS_Grid_TopBar_Element extends ExtJS_Element_Abstract
{
    
    public function render()
    {
        $content = "{";
        
        $content .= "text: '" . $this->getOption('text') . "',";
        $content .= "tooltip: '" . $this->getOption('tooltip') . "',";
        $content .= "iconCls: '" . $this->getOption('iconCls') . "'";
        
        if ($this->hasOption('disabled') && $this->getOption('disabled') === true) {
            $content .= ", disabled: true";
        }
        
        if ($this->hasOption('handler')) {
            $content .= ", handler: " . $this->getOption('handler');
        }
        
        $content .= "}";
        
        
        return $content;
    }
}