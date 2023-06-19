<?php

namespace Themegenie\DataDisplay\App\View\Components\DataDisplay;

use Illuminate\View\Component;

class Notification extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if(auth()->user()){
            return view('datadisplay::components.datadisplay.notification');
        }
        return false;
    }
}