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
        $content = 'Ext.create("Ext.form.Panel", {height: 200,renderTo: Ext.getBody(),frame: true,items: [],buttons: []});';
        $this->assertSame($content, $form->render());
    }
}