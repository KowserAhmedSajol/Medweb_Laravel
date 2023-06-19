<?php

namespace Themegenie\Actions\App\View\Components\Elements\Actions;

use Illuminate\View\Component;

class ButtonDropdown extends Component
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
        return view('actions::components.elements.actions.button-dropdown');
    }
}
