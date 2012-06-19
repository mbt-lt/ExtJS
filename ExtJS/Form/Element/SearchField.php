<?php
/**
 * ExtJS input text element
 *
 * @package ExtJS
 */
class ExtJS_Form_Element_SearchField extends Zend_Form_Element
{
    
    protected $_listId = null;
    
    public function setListId($listId)
    {
        $this->_listId = $listId;
    }
    
    public function getListId()
    {
        return $this->_listId;
    }
    
    /**
     * renders ExtJS form element
     *
     * @return string
     */
    public function render()
    {
        $content = "{
            fieldLabel: '" . $this->getDecorator('label')->setElement($this)->getLabel() ."',
            hasSearch: true,
            store: Ext.data.StoreManager.get('grid-store'),
            name: '" . $this->getName() . "',
            id: '" . $this->getName() ."',
            xtype: 'searchfield',
            paramName: '" . $this->getParamName() . "',
            value: '" . $this->getValue() . "',
            onTrigger2Click: function() {
                var me = this,
                store = me.store,
                proxy = store.getProxy(),
                value = me.getValue();

                if (value.length < 1) {
                    me.onTrigger1Click();
                    return;
                }
                
                proxy.extraParams[me.paramName] = value;
                store.loadPage(1);
                me.hasSearch = true;
                me.triggerEl.item(0).setDisplayed('block');
                me.doComponentLayout();            
            }
        ";
                 
        $content .= "}";
        
        return $content;
    }
    
    /**
     * returns param name
     *
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function getParamName()
    {
        return $this->getAttrib('paramName') ? $this->getAttrib('paramName') : 'filter';
    }
}