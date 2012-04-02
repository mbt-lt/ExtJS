<?php
/**
 * ExtJS Form element file test cases
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */
 
require_once 'ExtJS/Form//Element/File.php';
class ExtJS_Form_Element_FileTest extends PHPUnit_Framework_TestCase
{
    
    /**
     * tests if object can be created
     *
     * @return void
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function testCanCreateObject()
    {
        $file = new ExtJS_Form_Element_File('file');
        $this->assertInstanceOf('ExtJS_Form_Element_File', $file);
    }
    
    /**
     * test if object is rendered to string correctly
     *
     * @return void
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function testCanRenderObjectAsString()
    {
        $file = new ExtJS_Form_Element_File('file');
        $file->setLabel('label');
        
        $content = "{xtype: 'filefield',name : 'file',fieldLabel: 'label',buttonText: 'Browse...'}";
        
        $this->assertSame($content, $file->render());
        $this->assertSame($content, (string)$file);
    }
}