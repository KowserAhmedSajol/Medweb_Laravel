<?php

namespace Themegenie\DataEntry\App\View\Components\Elements\Buttons;

use Themegenie\LimitlessMaterial\App\View\Components\BaseComponent;

class Delete extends BaseComponent
{
    public $action, $outline, $classes;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($action = '#', $outline = false, $classes = null)
    {
        $this->action = $action;
        $this->outline = $outline;
        $this->classes = $classes;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('dataentry::components.elements.buttons.delete');
    }
}