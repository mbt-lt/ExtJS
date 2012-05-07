<?php
/**
 * ExtJS input text element
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */
class ExtJS_Form_Element_TextGenerator extends ExtJS_Form_Element_Text
{
    
    /**
     * renders ExtJS form element
     *
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function render()
    {
        /* text field content */

        $contentText = "{
            name: '" . $this->getName() . "',
            id: '" . $this->_idPrefix . $this->getName() . "',
            xtype: 'textfield',
            fieldLabel: '" . $this->getLabel() ."',
            value: '" . $this->getValue() . "'";
         
        if ($this->getAttrib('validator')) {
            $contentText .= ", validator: " . $this->getAttrib('validator');
        }
         
        if ($this->isRequired()) {
            $contentText .= ", allowBlank: false";
        }
        
        $contentText .= "}";
        
        /* generator button content */
        
        $contentButton = "{
            xtype: 'button',
            text: 'Generate',
            listeners: {
                click: {
                    fn: function() {
                        Ext.Ajax.request({
                            url: '" . $this->getAttrib('url') . "',
                            success: function(response) {
                                var result = Ext.JSON.decode(response.responseText);
                                Ext.getCmp('" . $this->_idPrefix . $this->getName() . "').setValue(result.value);
                            }
                        });
                    }
                }
            }
        }";
        
        /* whole field */
        $content = "{
            xtype: 'panel',
            layout: 'column',
            border: false,
            frame: false,
            bodyStyle: 'background: transparent;',
            ctCls: 'multicolumn',
            items: [$contentText,$contentButton]
        }";
        
        return $content;
    }
}
