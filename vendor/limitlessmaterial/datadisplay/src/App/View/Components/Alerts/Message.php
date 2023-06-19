<?php

namespace Themegenie\DataDisplay\App\View\Components\Alerts;

use Illuminate\View\Component;

class Message extends Component
{
    public $message = null;
    public $type = null;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type , $message = null)
    {
        $this->message = $message;
        $this->type = $type;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('datadisplay::components.alerts.message',
                    ['type'=>$this->type, 'message'=>$this->message ]
                );
    }
}