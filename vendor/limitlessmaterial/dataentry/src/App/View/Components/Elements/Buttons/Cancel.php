<?php

namespace Themegenie\DataEntry\App\View\Components\Elements\Buttons;

use Themegenie\LimitlessMaterial\App\View\Components\BaseComponent;

class Cancel extends BaseComponent
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
        return view('dataentry::components.elements.buttons.cancel');
    }
}