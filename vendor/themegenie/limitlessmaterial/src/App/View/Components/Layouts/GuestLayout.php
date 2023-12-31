<?php

namespace Themegenie\LimitlessMaterial\App\View\Components\Layouts;

use Illuminate\View\Component;

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('limitlessmaterial::components.layouts.guest');
    }
}
