<?php
/**
 * ExtJS Grid
 *
 * @package ExtJS
 * @author aur1mas <aur1mas@devnet.lt>
 */
class ExtJS_Grid extends ExtJS_Element_Abstract
{
    
    /**
     * ExtJS data Store
     *
     * @var ExtJS_Data_Store
     */
    protected $_store;
    
    /**
     * ExtJS Grid Columns
     *
     * @var string
     */
    protected $_columns;
    
    /**
     * paging toolbar
     *
     * @var ExtJS_Grid_PagingToolbar
     */
    protected $_paging;
    
    /**
     * topbar
     *
     * @var ExtJS_Grid_TopBar
     */
    protected $_topBar;
    
    /**
     * selection model
     *
     * @var ExtJS_Selection_Abstract
     */
    protected $_selectionModel;
    
    /**
     * selection model
     *
     * @param ExtJS_Selection_Abstract $selection 
     * @return ExtJS_Grid
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function setSelectionModel(ExtJS_Selection_Abstract $selection)
    {
        $this->_selectionModel = $selection;
        return $this;
    }
    
    /**
     * has selection model
     *
     * @return boolean
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function hasSelectionModel()
    {
        return $this->_selectionModel instanceof ExtJS_Selection_Abstract;
    }
    
    /**
     * get selection model
     *
     * @return ExtJS_Selection_Abstract
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function getSelectionModel()
    {
        if (!$this->hasSelectionModel()) {
            throw new ExtJS_Exception("Selection model not found");
        }
        
        return $this->_selectionModel;
    }
    
    /**
     * sets topBar to Grid
     *
     * @param ExtJS_Grid_TopBar $topBar 
     * @return ExtJS_Grid
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function setTopBar(ExtJS_Grid_TopBar $topBar)
    {
        $this->_topBar = $topBar;
        return $this;
    }
    
    /**
     * checks if Grid has topBar
     *
     * @return boolean
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function hasTopBar()
    {
        return $this->_topBar instanceof ExtJS_Grid_TopBar;
    }
    
    /**
     * get TopBar
     *
     * @return ExtJS_Grid_TopBar
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function getTopBar()
    {
        if (!$this->hasTopBar()) {
            throw new ExtJS_Exception("TopBar not found");
        }
        
        return $this->_topBar;
    }
    
    /**
     * check if Grid has paging
     *
     * @return boolean
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function hasPaging()
    {
        return $this->_paging instanceof ExtJS_Grid_PagingToolbar;
    }
    
    /**
     * pagging toolbar
     *
     * @param ExtJS_Grid_PagingToolbar $paging 
     * @return ExtJS_Grid
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function setPaging(ExtJS_Grid_PagingToolbar $paging)
    {
        $this->_paging = $paging;
        return $this;
    }
    
    /**
     * get paging toolbar
     *
     * @return ExtJS_Grid_PagingToolbar
     * @throws ExtJS_Exception
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function getPaging()
    {
        if (!$this->hasPaging()) {
            throw new ExtJS_Exception('Paging not found');
        }
        
        return $this->_paging;
    }
    
    /**
     * ExtJS data store
     *
     * @param mixed <ExtJS_Data_Store|string> $store    store can be object or just store id if it's already created
     * @return ExtJS_Grid
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function setStore($store)
    {
        $this->_store = $store;
        return $this;
    }
    
    /**
     * returns store
     *
     * @return ExtJS_Data_Store
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function getStore()
    {
        // store can be string OR object
        if ($this->_store instanceof ExtJS_Data_Store) {
            return $this->_store;
        } else if (mb_strlen($this->_store, 'utf-8') > 0) {
            return "'" . $this->_store . "'";
        }
        
        throw new ExtJS_Exception("Store not found");
    }
    
    /**
     * set grid columns
     *
     * @param array $columns 
     * @return ExtJS_Grid
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function setColumns(array $columns)
    {
        $this->_columns = $columns;
        return $this;
    }
    
    /**
     * returns columns
     *
     * @return array
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function getColumns()
    {
        return $this->_columns;
    }
    
    /**
     * renders ExtJS Grid JS
     *
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function render()
    {
        $content = '
                Ext.create("Ext.grid.Panel", {
                   store: ' . $this->getStore() . ',';
        
        if ($this->hasSelectionModel()) {
            $content .= "selModel: " . $this->getSelectionModel() . ",";
        }
        
        $content .= "columns: [";
        foreach ($this->getColumns() as $column) {
           $content .= "{
               text: '" . $column['title'] . "',
               sortable: '" . $column['sortable'] . "',
               dataIndex: '" . $column['dataIndex'] . "'
           },";
        }
        $content .= "],";
        
        if ($this->hasPaging()) {
            $content .= "bbar: " . $this->getPaging() . ",";
        }
        
        if ($this->hasOption('title')) {
            $content .= "title: '" . $this->getOption('title') . "',";
        }
        
        if ($this->hasTopBar()) {
            $content .= "tbar: " . $this->getTopBar() . ",";
        }
        
        if ($this->getOption('width')) {
            $content .= "width: " . $this->getOption('width') . ",";
        }
        
        if ($this->hasOption('onItemDblClick')) {
            $content .= "listeners: {
                itemdblclick: ".$this->getOption('onItemDblClick')."
            },";
        }
        
        if ($this->hasOption('viewConfig')) {
            $content .= "viewConfig: " . $this->getOption('viewConfig') . ',';
        }
        
        $id = $this->getOption('id');
                   
        $content .= "
            renderTo: '" . $this->getOption('renderTo') . "',
            id: '" . ($id ? $id : $this->getOption('renderTo')) . "',
            forceFit: true
        })";
        
        return $content;
    }
    
    /**
     * @see this#render
     * @return string
     * @author aur1mas <aur1mas@devnet.lt>
     */
    public function __toString()
    {
        return $this->render();
    }
}