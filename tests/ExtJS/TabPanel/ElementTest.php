<?php
/**
 * tests TabPanel Element
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */
 
require_once 'ExtJS/TabPanel/Element.php';
class ExtJS_TabPanel_ElementTest extends PHPUnit_Framework_TestCase
{
    
    /**
     * get default element
     *
     * @return ExtJS_TabPanel_Element
     * @author aur1mas <aur1mas@devnet.lt>
     */
    protected function _getElement()
    {
        return new ExtJS_TabPanel_Element();
    }
    
    /**
     * tests can object be created properly
     *
     * @return void
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function testCanCreateObject()
    {
        $this->assertInstanceOf("ExtJS_TabPanel_Element", $this->_getElement());
    }
    
    /**
     * test can set title
     *
     * @return void
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function testCanSetTitle()
    {
        $title = 'test title';
        
        $element = $this->_getElement();
        
        $this->assertSame(null, $element->getTitle());
        
        $element->setOption('title', $title);
        
        $this->assertSame($title, $element->getTitle());
    }
    
    /**
     * test can set listeners
     *
     * @return void
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function testCanSetListeners()
    {
        $listeners = array(
            'activate' => "function(tab) { console.log(tab); }"
        );
        
        $element = $this->_getElement();
        
        $this->assertFalse($element->hasListeners());
        
        $element->setListeners($listeners);
        $this->assertTrue($element->hasListeners());
        $this->assertCount(1, $element->getListeners());
    }
}