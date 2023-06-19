<?php

namespace Themegenie\DataDisplay\App\View\Components\Tables;

use Themegenie\LimitlessMaterial\App\View\Components\BaseComponent;

class Table extends BaseComponent
{
    private $data = [];
    protected $type = null;
    protected $id = null;

    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = null, $id = null)
    {
        $this->type = $type;
        $this->id   = $id;

        $this->data = ['id'=>$this->id,'type'=>$this->type];
        
     }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $view =  'datadisplay::components.tables.table-'.$this->type;
        return view($view, $this->data);
    }
}