<?php

namespace Themegenie\DataEntry\App\View\Components\Elements\DataEntry\Options;

use Illuminate\View\Component;

class Select extends Component
{
    public $selected = 12;
    public $options = [6=>6,12=>12,18=>18];
    public $attributeSet;
    public $placeholder;
    public $label = [];
    public $grid = false;

    public function __construct($attributes = [],$selected = null, $options = null,$placeholder=null,$config=[])
    {

        if(!is_null($selected)){
            $this->selected = $selected;
        }
        if(!is_null($options)){
            $this->options = $options;
        }
        if(!is_null($attributes)){
            $this->attributeSet = $this->formatAttributes($attributes);
        }
        $this->placeholder = $placeholder;

        if(is_array($config) && array_key_exists('label',$config ) && !empty($config['label'])){
            $this->_label($config['label']);
        }
        if(is_array($config) && array_key_exists('grid',$config ) && !empty($config['grid'])){
            $this->_grid($config['grid']);
        }else{
            $this->_grid(['label'=>'col-12','field'=>'col-12']);
        }
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


    private function _label($labelConfig){
    
        if(is_array($labelConfig) && array_key_exists('text',$labelConfig) && !empty($labelConfig['text'])){
            $this->label['text'] = $labelConfig['text'];
        }else{
            $this->label['text'] = false;
        }
        if(is_array($labelConfig) && array_key_exists('direction',$labelConfig) && !empty($labelConfig['direction'])){
            $this->label['direction'] = $labelConfig['direction'];
        }else{
            $this->label['direction'] = false;
        }

        if(!is_array($labelConfig) && !empty($labelConfig)){
            $this->label['text'] = 'error: please pass an array';
        }
        
    }

    private function _grid($gridConfig){
    
        if(is_array($gridConfig) && array_key_exists('label',$gridConfig ) && !empty($gridConfig['label'])){
            $this->grid['label'] = $gridConfig['label'];
        }else{
            $this->grid['label'] = false;
        }
        if(is_array($gridConfig) && array_key_exists('field',$gridConfig ) && !empty($gridConfig['field'])){
            $this->grid['field'] = $gridConfig['field'];
        }else{
            $this->grid['field'] = false;
        }
        
    }

    
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('dataentry::components.elements.data-entry.options.select');
    }
}