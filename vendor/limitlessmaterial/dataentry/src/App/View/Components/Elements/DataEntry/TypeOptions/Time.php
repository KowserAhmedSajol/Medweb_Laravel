<?php

namespace Themegenie\DataEntry\App\View\Components\Elements\DataEntry\TypeOptions;

use Illuminate\View\Component;

class Time extends Component
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
        return view('dataentry::components.elements.data-entry.type-options.time');
    }
}