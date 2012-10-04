<?php
/**
 * selection model
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */
abstract class ExtJS_Selection_Abstract
{

    /**
     * listeners
     *
     * @var array
     */
    protected $_listeners = array();

    /**
     * selection model name
     *
     * @var string
     **/
    protected $_name;  

    /**
     * constructs object
     *
     * @return void
     * @author aur1mas <aurimas@devnet.lt>
     **/
    public function __construct()
    {
        /* extracts selection model name from */
        $name = explode('_', get_class($this));
        $name = 'Ext.selection.' . array_pop($name);
        $this->setName($name);
    }
    
    /**
     * has listeners
     *
     * @return boolean
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function hasListeners()
    {
        return count($this->_listeners) > 0;
    }
    
    /**
     * set listener
     *
     * @param string $name 
     * @param string $function 
     * @return ExtJS_Selection_RowModel
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function setListener($name, $function)
    {
        $this->_listeners[$name] = $function;
        return $this;
    }
    
    /**
     * get listeners
     *
     * @return array
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function getListeners()
    {
        return $this->_listeners;
    }

    /**
     * sets selection model name
     *
     * @return ExtJS_Selection_Abstract
     * @author aur1mas <aurimas@devnet.lt>
     **/
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }

    /**
     * returns name
     *
     * @return string
     * @author aur1mas <aurimas@devnet.lt>
     **/
    public function getName()
    {
        return $this->_name;
    }

    /**
     * renders selection mode
     *
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function render()
    {
        $content = "Ext.create(" . $this->getName() . ", {";
        
        $content .= "listeners: {";
        
        foreach ($this->getListeners() as $listener => $function) {
            $content .= $listener . ": " . $function . ",";
        }

        $content .= "}";    
        
        $content .= "})";
        
        return $content;
    }
    
    /**
     * @see this#render
     * @return void
     * @author aur1mas
     */
    public function __toString()
    {
        return $this->render();
    }
}