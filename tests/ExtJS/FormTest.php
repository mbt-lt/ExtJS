<?php
/**
 * test form
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */
require_once 'ExtJS/Form.php';
class ExtJS_FormTest extends PHPUnit_Framework_TestCase
{
    
    /**
     * issue #2 (https://github.com/mbt-lt/ExtJS/issues/2)
     *
     * @return void
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function testCanSetHeight()
    {
        $form = new ExtJS_Form();
        $form->setAttrib('height', 200);
        $content = "Ext.create('Ext.form.Panel', {frame: true, height: 200, action: '', renderTo: Ext.getBody(), items: [],buttons: []});";
        $this->assertSame($content, $form->render());
    }
    
    /**
     * issue #6 (https://github.com/mbt-lt/ExtJS/issues/6)
     *
     * @return void
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function testCansetHidden()
    {
        $form = new ExtJS_Form();
        $form->setAttrib('hidden', true);
        $content = "Ext.create('Ext.form.Panel', {frame: true, hidden: true, action: '', renderTo: Ext.getBody(), items: [],buttons: []});";
        
        $this->assertSame($content, $form->render());
    }
}