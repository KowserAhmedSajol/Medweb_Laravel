<?php

namespace Themegenie\Actions\App\View\Components\Elements\Links;

use Illuminate\View\Component;

class LinkTree extends Component
{
    public $outline;
    public $classes;
    public $display = true;
    public $entity = null;
    public $icon   = null;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($outline = false, $classes = null, $display = true, $entity = "",$icon = 'tree')
    {
        $this->outline = $outline;
        $this->classes = $classes;
        $this->display = $display; // should come from session
        $this->entity  = $entity;
        $this->icon = $icon;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if($this->display){
            return view('actions::components.elements.links.link-tree');
        }
        
    }
}