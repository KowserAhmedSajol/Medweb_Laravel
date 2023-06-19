<?php

namespace Themegenie\Actions\App\View\Components\Elements\Links;

use Illuminate\View\Component;

class LinkCancel extends Component
{
    public $outline;
    public $classes;
    public $display = true;
    public $entity = null;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($outline = false, $classes = null, $display = true, $entity = "hello")
    {
        $this->outline = $outline;
        $this->classes = $classes;
        $this->display = $display; // should come from session
        $this->entity  = $entity;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if($this->display){
            return view('actions::components.elements.links.link-cancel');
        }
        
    }
}
