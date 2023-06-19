<?php

namespace Themegenie\LimitlessMaterial\App\View\Components\Layouts\Partials;

use Themegenie\LimitlessMaterial\App\View\Components\LayoutComponent;

class Breadcrumb extends LayoutComponent
{
    public $display = true;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        // update this from database | session
        $this->display = true;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if( $this->display ){
            return view('limitlessmaterial::components.layouts.partials.breadcrumb');
        }
        return false;
    }
}
