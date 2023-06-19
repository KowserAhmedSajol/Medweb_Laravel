<?php

namespace Themegenie\LimitlessMaterial\App\View\Components\Layouts;

use Themegenie\LimitlessMaterial\App\View\Components\LayoutComponent;
use Themegenie\LimitlessMaterial\Contracts\ILayout;

class Master extends LayoutComponent implements ILayout
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

        // update default value of $this->layoutConfig using session, db or config

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('limitlessmaterial::components.layouts.master');
    }
}
