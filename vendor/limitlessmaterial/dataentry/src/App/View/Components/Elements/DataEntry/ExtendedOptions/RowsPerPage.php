<?php

namespace Themegenie\DataEntry\App\View\Components\Elements\DataEntry\ExtendedOptions;

use Illuminate\View\Component;

class RowsPerPage extends Component
{
    public $selected = 15;
    public $options = [5=>5,10=>10,15=>15];

    public function __construct($selected = null, $options = null)
    {
        if(!is_null($selected)){
            $this->selected = $selected;
        }
        if(!is_null($options)){
            $this->options = $options;
        }
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('dataentry::components.elements.data-entry.extended-options.rowsperpage');
    }
}