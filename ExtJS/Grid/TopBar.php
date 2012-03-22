<?php
/**
 * ExtJS Grid TopBar
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */
class ExtJS_Grid_TopBar extends ExtJS_Element_Abstract
{
    
    /**
     * topbar items
     *
     * @var array
     */
    protected $_items = array();
    
    /**
     * topbar items
     *
     * @param array $items 
     * @return ExtJS_Grid_TopBar
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function setItems(array $items = array())
    {
        $this->_items = $items;
        return $this;
    }
    
    /**
     * topbar items
     *
     * @return array
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function getItems()
    {
        return $this->_items;
    }
    
    /**
     * renders TopBar for Grid
     *
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function render()
    {
        $content = "{
            xtype: 'toolbar',
            items: [";
        foreach ($this->getItems() as $item) {
            $content .= $item->render() . ",";
        }
        $content .= "]}";
        
        return $content;
    }
}