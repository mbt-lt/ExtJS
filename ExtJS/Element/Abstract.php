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
     * @var Zend_View_Interface
     */
    protected $_view;
    
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
     * sets option
     *
     * @param string $key 
     * @param string $value 
     * @return ExtJS_Element_Abstract
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function setOption($key, $value)
    {
        $this->_options[$key] = $value;
        return $this;
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
    
    /**
     * Set view object
     *
     * @param  Zend_View_Interface $view
     * @return Zend_Form
     */
    public function setView(Zend_View_Interface $view = null)
    {
        $this->_view = $view;
        return $this;
    }

    /**
     * Retrieve view object
     *
     * If none registered, attempts to pull from ViewRenderer.
     *
     * @return Zend_View_Interface|null
     */
    public function getView()
    {
        if (null === $this->_view) {
            require_once 'Zend/Controller/Action/HelperBroker.php';
            $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
            $this->setView($viewRenderer->view);
        }

        return $this->_view;
    }
    
}
