<?php
/**
 * tab panel element
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */
require_once 'ExtJS/Element/Abstract.php';
class ExtJS_TabPanel_Element extends ExtjS_Element_Abstract
{    
    
    protected $_title;
    
    /**
     * set title
     *
     * @param string $title 
     * @return ExtJS_TabPanel_Element
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function setTitle($title)
    {
        $this->_title = (string)$title;
        return $this;
    }
    
    /**
     * get tab title
     *
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function getTitle()
    {
        return $this->_title;
    }
    
    /**
     * set listeners
     *
     * @param array $listeners 
     * @return ExtJS_TabPanel_Element
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function setListeners(array $listeners)
    {
        $this->_listeners = $listeners;
        return $this;
    }
    
    /**
     * check if element has listeners
     *
     * @return boolean
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function hasListeners()
    {
        return count($this->_listeners) > 0;
    }
    
    /**
     * returns listeners
     *
     * @return array
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function getListeners()
    {
        return $this->_listeners;
    }
    
    /**
     * renders content as string
     *
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function render()
    {
        $content = "{";
        $content .= "title: '" . $this->getTitle() . "',";
        
        $content .= "loader: {
            url: '" . $this->getOption('url') . "',
            contentType: 'html',
            scripts: true,
            loadMask: true
        },";
        
        
        if ($this->hasListeners()) {
            $content .= "listeners: {";
            foreach ($this->getListeners() as $key => $function) {
                $content .= $key . ": " . $function . ",";
            }
            $content .= "}";
        }
        
        $content .= "}";
        
        return $content;
    }
}