<?php

namespace Themegenie\Actions\App\View\Components\Elements\Buttons;

use Illuminate\View\Component;

class Submit extends Component
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
        return view('actions::components.elements.buttons.submit');
    }
}