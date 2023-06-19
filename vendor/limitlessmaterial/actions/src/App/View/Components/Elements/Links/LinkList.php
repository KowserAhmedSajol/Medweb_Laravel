<?php

namespace Themegenie\Actions\App\View\Components\Elements\Links;

use Illuminate\View\Component;

class LinkList extends Component
{
    public $outline;
    public $classes;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($outline = false, $classes = null)
    {
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
        return view('actions::components.elements.links.link-list');
    }
}
