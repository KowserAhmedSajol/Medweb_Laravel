<?php

namespace Themegenie\DataDisplay\App\View\Components;

use Illuminate\View\Component;

class Pagination extends Component
{
    protected $showCurrentPage = true;
    protected $showPageNumber  = true;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($showCurrentPage, $showPageNumber)
    {
        $this->showCurrentPage = $showCurrentPage;
        $this->showPageNumber  = $showPageNumber;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('datadisplay::components.pagination',['cPage'=>$this->showCurrentPage, 'pNumber'=>$this->showPageNumber]);
    }
}