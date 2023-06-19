<?php

namespace Themegenie\DataEntry\App\View\Components\Elements\DataDisplay;

use Illuminate\View\Component;

class Label extends Component
{
    protected $label = null;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label=null)
    {
        if(!is_null($label)){
            $this->label = $label;
        }
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
            return view('dataentry::components.elements.data-display.label',['label'=>$this->label]);
    }
}