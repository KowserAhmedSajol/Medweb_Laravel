<?php

namespace Themegenie\Actions\App\View\Components\Elements\Buttons;

use Illuminate\View\Component;

class BtnAny extends Component
{
    protected $data = null;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($icon = null, $label = 'Button')
    {
        $this->icon  = $icon;
        $this->label = $label;

        $this->data = [
            'bg_color'=>$this->color_teal800,
            'ele_ml'=>$this->ele_ml,
            'icon_ml'=>$this->icon_ml,
            'icon'=>$this->icon,
            'label'=>$this->label,
        ];
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('actions::components.elements.buttons.btn-any', $this->data);
    }
}