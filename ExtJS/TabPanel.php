<?php
/**
 * ExtJS tab panel
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */
class ExtJS_TabPanel extends ExtJS_Element_Abstract
{
    /**
     * items
     *
     * @var array
     */
    protected $_items = array();
    
    /**
     * set tabs
     *
     * @param array $items 
     * @return ExtJS_TabPanel
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function setItems(array $items)
    {
        $this->_items = $items;
        return $this;
    }
    
    /**
     * returns items
     *
     * @return array
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function getItems()
    {
        return $this->_items;
    }
    
    /**
     * where to render content
     *
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function getRenderTo()
    {
        return $this->getOption('renderTo') ? $this->getOption('renderTo') : 'document.body';
    }
    
    /**
     * returns active tab
     *
     * @return int
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function getActiveTab()
    {
        return $this->getOption('activeTab') ? (int)$this->getOption('activeTab') : 0;
    }
    
    /**
     * renders element
     *
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function render()
    {
        $content = "Ext.createWidget('tabpanel', {";
        $content .= "renderTo: '" . $this->getRenderTo() . "',
            activeTab: " . $this->getActiveTab() . ",";
            
        if ($this->getOption('width')) {
            $content .= "width: " . (int)$this->getOption('width') . ",";
        }
        
        if ($this->getOption('height')) {
            $content .= "height: " . (int)$this->getOption('height') . ",";
        }
        
        if ($this->getOption('plain') && $this->getOption('plain') === true) {
            $content .= "plain: true,";
        }
        
        $content .= "items: [";
        
        /**
         * @todo create ExtJS_TabPanel_Item
         */
        foreach ($this->getItems() as $item) {
            $content .= "{";
            $content .= "title: '" . $item['title'] . "',";
            $content .= "loader: {";
            $content .= "url: '" . $item['loader']['url'] . "',";
            $content .= "contentType: 'html',
                scripts: true,
                loadMask: true";
            $content .= "},
            listeners: {
                               activate: function(tab) {
                                   tab.loader.load();
                               }
                           }
            },";
        }
        $content .="] });";

        return $content;
    }
}