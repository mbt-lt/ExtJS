<?php
/**
 * test form element password
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */
require_once 'ExtJs/Form/Element/Password.php';
class ExtJS_Form_Element_PasswordTest extends PHPUnit_Framework_TestCase
{
    
    /**
     * Issue #1. https://github.com/mbt-lt/ExtJS/issues/1
     *
     * @return void
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function testIsInputTypeCorrect()
    {
        $element1 = new ExtJS_Form_Element_Password('password');
        $content1 = "{
            fieldLabel: '',
            name: 'password',
            inputType: 'password',
            xtype: 'textfield'}";
        $this->assertSame($content1, $element1->render());
        
        $elmement2 = new ExtJS_Form_Element_Password('password2');
        $content2 = "{
            fieldLabel: '',
            name: 'password2',
            inputType: 'password',
            xtype: 'textfield'}";
        $this->assertSame($content2, $elmement2->render());
    }
}