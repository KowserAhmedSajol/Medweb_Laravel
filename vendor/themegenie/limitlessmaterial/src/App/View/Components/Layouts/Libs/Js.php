<?php

namespace Themegenie\LimitlessMaterial\App\View\Components\Layouts\Libs;

use Themegenie\LimitlessMaterial\App\View\Components\LayoutComponent;

class Js extends LayoutComponent
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
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
        return view('limitlessmaterial::components.layouts.libs.js');
    }
}
