<?php

namespace Themegenie\DataDisplay\App\View\Components\Alerts;

use Illuminate\View\Component;

class ToastComponent extends Component
{

    public function __construct()
    {
        
    }
    
    public function render()
    {
        return view('datadisplay::components.alerts.toast');
    }
}
