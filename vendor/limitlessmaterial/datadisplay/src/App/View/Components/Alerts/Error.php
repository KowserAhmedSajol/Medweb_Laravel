<?php

namespace Themegenie\DataDisplay\App\View\Components\Alerts;

use Themegenie\LimitlessMaterial\App\View\Components\BaseComponent;

class Error extends BaseComponent
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('datadisplay::components.alerts.errors');
    }
}