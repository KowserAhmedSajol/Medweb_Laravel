<?php

namespace Themegenie\DataDisplay\App\View\Components\Tables;

use Themegenie\LimitlessMaterial\App\View\Components\BaseComponent;
class TableBody extends BaseComponent
{
    private $data = null;
    protected $id = null;

    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $id = null)
    {
        $this->data['id'] = $id;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $view =  'datadisplay::components.tables.table-body';
        return view($view, $this->data);
    }
}