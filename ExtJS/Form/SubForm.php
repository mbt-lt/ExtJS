<?php
/**
 * form subform
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */
class ExtJS_Form_SubForm extends Zend_Form_SubForm
{
    
    /**
     * renders object to string
     *
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function render()
    {
        $content = "items: [";
        
        $iterator = new ArrayIterator($this->getElements());
        while ($iterator->valid()) {
            $item = $iterator->current();
            $content .= $item->render();
            $iterator->next();
            
            if ($iterator->valid()) {
                $content .= ",";
            }
        }

        $content .= "]";
        
        return $content;
    }
}