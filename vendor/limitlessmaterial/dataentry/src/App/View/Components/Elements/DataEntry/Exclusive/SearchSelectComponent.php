<?php

namespace Themegenie\DataEntry\App\View\Components\Elements\DataEntry\Exclusive;

use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;
use Mzr\Smertgenie\Share\Models\ProcessShare;
use Illuminate\Support\Str;

class SearchSelectComponent extends Component
{

    public $attributeSet
           ,$selected
           ,$placeholder
           ,$name
           ,$getApi
           ,$selectId
           ,$recordId
           ,$recordText;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($attributes = []
                                , $selected = null
                                , $name = null
                                , $getApi = null
                                , $selectId = null
                                , $placeholder = null
                                , $recordId = null
                                , $recordText = null
                                )
    {
       $this->selected = $selected;
       $this->name = $name;
       $this->placeholder = $placeholder ?? __('Please Select');
       $this->attributeSet = $this->formatAttributes($attributes);
       $this->getApi = $getApi;
       $this->selectId = $selectId;
       $this->recordId = $recordId;
       $this->recordText = $recordText;
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
        return view('dataentry::components.elements.data-entry.exclusive.search-select');
    }
}
