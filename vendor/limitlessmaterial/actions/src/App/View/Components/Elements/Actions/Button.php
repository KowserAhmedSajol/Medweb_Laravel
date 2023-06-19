<?php

namespace Themegenie\Actions\App\View\Components\Elements\Actions;

use Illuminate\View\Component;

class Button extends Component
{
    public $dropdownData=false;
    // public $label = false;
    public $label = false; //['text' =>__('Button'),'dropdown' =>  true ]
    public $icon = false; //['key' =>'icon-envelop2', 'align'=>'left/right']
    public $decoration = false; 
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($config=null, $dropdownData=null)
    {
       $this->dropdownData= $dropdownData;
        if(is_array($config) && array_key_exists('label',$config ) && !empty($config['label'])){
            $this->_label($config['label']);
        }else{
            $this->_label('');
        }
        if(is_array($config) && array_key_exists('icon',$config ) && !empty($config['icon'])){
            $this->_icon($config['icon']);
        }else{
            $this->_icon('');
        }
        if(is_array($config) && array_key_exists('decoration',$config ) && !empty($config['decoration'])){
            $this->_decoration($config['decoration']);
        }else{
            $this->_decoration('');
        }
    }
    private function _label($labelConfig){
        if(is_array($labelConfig) && array_key_exists('text',$labelConfig ) && !empty($labelConfig['text'])){
            $this->label['text'] = $labelConfig['text'];
        }else{
            $this->label['text'] = false;
        }
        if(is_array($labelConfig) && array_key_exists('dropdown',$labelConfig ) && !empty($labelConfig['dropdown'])){
            $this->label['dropdown'] = $labelConfig['dropdown'];
            $this->label['dropdownIcon'] = 'dropdown-toggle';
        }else{
            $this->label['dropdown'] = false;
            $this->label['dropdownIcon'] = false;
        }
        if(is_array($labelConfig) && array_key_exists('menuAlign',$labelConfig ) && !empty($labelConfig['menuAlign'])){
            $this->label['menuAlign'] = $labelConfig['menuAlign'];
        }else{
            $this->label['menuAlign'] = false;
        }

        if(!is_array($labelConfig) && !empty($labelConfig)){
            $this->label['text'] = 'error: please pass an array';
        }
        
    }
    private function _icon($iconConfig){
    
        if(is_array($iconConfig) && array_key_exists('key',$iconConfig ) && !empty($iconConfig['key'])){
            $this->icon['key'] = $iconConfig['key'];
        }else{
            $this->icon['key'] = false;
        }
        if(is_array($iconConfig) && array_key_exists('align',$iconConfig ) && !empty($iconConfig['align'])){
            $this->icon['align'] = $iconConfig['align'];
        }else{
            $this->icon['align'] = 'left';
        }

        if(!is_array($iconConfig) && !empty($iconConfig)){
            $this->icon['key'] = 'error: please pass an array';
        }
        
    }
    private function _decoration($decorationConfig){
    
        if(is_array($decorationConfig) && array_key_exists('color',$decorationConfig ) && !empty($decorationConfig['color'])){
            $this->decoration['color'] = $decorationConfig['color'];
        }else{
            $this->decoration['color'] = false;
        }
        if(is_array($decorationConfig) && array_key_exists('segmented',$decorationConfig ) && !empty($decorationConfig['segmented'])){
            $this->decoration['segmented'] = $decorationConfig['segmented'];
            $this->label['dropdownIcon']= false;
        }else{
            $this->decoration['segmented'] = false;
        }
        if(is_array($decorationConfig) && array_key_exists('dropdownStyle',$decorationConfig ) && !empty($decorationConfig['dropdownStyle'])){
            $this->decoration['dropdownStyle'] = $decorationConfig['dropdownStyle'];
        }else{
            $this->decoration['dropdownStyle'] = false;
        }

        if(!is_array($decorationConfig) && !empty($decorationConfig)){
            $this->decoration['segmented'] = 'error: please pass an array';
        }
        
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('actions::components.elements.actions.button');
    }
}