<?php
/**
 * abstract ExtJS element
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */
 
require_once 'ExtJS/Element/Interface.php';
abstract class ExtJS_Element_Abstract implements ExtJS_Element_Interface
{
    
    /**
     * element options
     *
     * @var array
     */
    protected $_options = array();
    
    /**
     * constructs object
     *
     * @param array $options 
     * @author aur1mas
     */
    public function __construct(array $options = array())
    {
        $this->_options = $options;
    }
    
    /**
     * set options
     *
     * @param array $options 
     * @return ExtJS_Element_Abstract
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function setOptions(array $options = array())
    {
        $this->_options = $options;
        return $this;
    }
    
    /**
     * checks if option is present
     *
     * @param string $key 
     * @return boolean
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function hasOption($key)
    {
        return isset($this->_options[$key]);
    }
    
    /**
     * get option
     *
     * @param string $key 
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function getOption($key)
    {
        if ($this->hasOption($key)) {
            return $this->_options[$key];
        }
        
        return null;
    }

    
    /**
     * @see ExtJS_Element_Interface#__toString
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function __toString()
    {
        return $this->render();
    }
}