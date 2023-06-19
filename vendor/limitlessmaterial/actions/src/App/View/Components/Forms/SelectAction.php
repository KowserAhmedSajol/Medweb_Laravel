<?php

namespace Themegenie\Actions\App\View\Components\Forms;

use Illuminate\View\Component;
use Themegenie\Actions\Models\Action;

class SelectAction extends Component
{

    public $attributeSet;

    public $options;

    public $selected;

    public $placeholder;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($attributes = [], $selected = null)
    {
       $this->selected = $selected;
       $this->placeholder = $attributes['placeholder'] ?? null;
       $this->attributeSet = $this->formatAttributes($attributes);
       $this->options = $this->options();
    }

    public function options(){
        return Action::pluck('title', 'id')->toArray();
    }

    public function formatAttributes(array $attributes): string
    {
       if(isset($attributes['selected'])) unset($attributes['selected']);
       if(isset($attributes['placeholder'])) unset($attributes['placeholder']);

        $formattedAttribute = '';
        foreach($attributes as $attributeName => $attributeValue){
            $formattedAttribute .= "{$attributeName}=\"{$attributeValue}\" ";
        }
        return $formattedAttribute;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('Themegeniematerial::components.elements.data-entry.options.select');
    }
}
