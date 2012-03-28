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
     * tests can object be created properly
     *
     * @return void
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function testCanCreateObject()
    {
        $element = new ExtJS_TabPanel_Element();
        $this->assertInstanceOf("ExtJS_TabPanel_Element", $element);
    }
}