<?php

namespace Themegenie\DataEntry\App\View\Components\Elements\DataEntry\ExtendedOptions;

use Illuminate\View\Component;

class DateRange extends Component
{


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
        return view('dataentry::components.elements.data-entry.extended-options.daterange');
    }
}