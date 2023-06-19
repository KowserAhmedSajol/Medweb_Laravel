<?php

namespace Themegenie\DataEntry\App\View\Components\Elements\DataEntry\BasicInputs;

use Illuminate\View\Component;

class Checkbox extends Component
{
    public $label = []; //['text' =>__('Checked'),'stacked' =>  'left/right/inline', 'display' => 'inline' ]
    public $field='checkbox';  //['id', 'name', 'placeholder', 'value'] ['readonly', 'disabled', 'autocomplete', 'required'] ['class for field']
    public $decoration = false; // ['class' => '', 'style' => 'inline css']

    /* public $label = false; //['text' =>__('Email'),'direction' =>  'horizontal' ]
    public $field='checkbox'; //['id', 'name', 'placeholder', 'value'] ['readonly', 'disabled', 'autocomplete', 'required'] ['class for field']
    public $help = false; //['text' => __('e.g john@gmail.com'), 'class'=>'abc']
    public $icon = false; //['key' =>'icon-envelop2', 'align'=>'left']
 
    public $grid = false; //['label'=>'col-12', 'field' =>'col-12']

    public $validation; //['key'=>'email validation', 'rule'=> ['rule1','rule2'], 'error'=>'text', 'instruction'=>'validation instruction']

    public $mask = false; //['key'=>'value'] 

    public $event = false; //['onEvent'=>['handler1', 'handler2']];

    public $permission = false; // ['r'=true, 'w'] 

    public $lib = false; //['js'=> [], 'css'=> []]

    public $snippet = false; //['code'=>'code block', 'apiSnippet' => 'url']

    

    public $api = false; //['get'=>'', 'post'=>'', 'token'=>''] */

    /**
     * Create a new component instance.
     *
     * @return void
     *
     */
    public function __construct($config=null)
    {

        if(is_array($config) && array_key_exists('label',$config ) && !empty($config['label'])){
            $this->_label($config['label']);
        }
    //     if(is_array($config) && array_key_exists('help',$config ) && !empty($config['help'])){
    //         $this->_help($config['help']);
    //     }
    //     if(is_array($config) && array_key_exists('icon',$config ) && !empty($config['icon'])){
    //         $this->_icon($config['icon']);
    //     }
        if(is_array($config) && array_key_exists('decoration',$config ) && !empty($config['decoration'])){
            $this->_decoration($config['decoration']);
        }else{
            $this->_decoration('');
        }
    //     if(is_array($config) && array_key_exists('grid',$config ) && !empty($config['grid'])){
    //         $this->_grid($config['grid']);
    //     }
    //     if(is_array($config) && array_key_exists('mask',$config ) && !empty($config['mask'])){
    //         $this->_mask($config['mask']);
    //     }
    //     if(is_array($config) && array_key_exists('event',$config ) && !empty($config['event'])){
    //         $this->_event($config['event']);
    //     }
    //     if(is_array($config) && array_key_exists('permission',$config ) && !empty($config['permission'])){
    //         $this->_permission($config['permission']);
    //     }
    //     if(is_array($config) && array_key_exists('lib',$config ) && !empty($config['lib'])){
    //         $this->_lib($config['lib']);
    //     }
    //     if(array_key_exists('snippet',$config ) && !empty($config['snippet'])){
    //         $this->_snippet($config['snippet']);
    //     }
    //     if(is_array($config) && array_key_exists('api',$config ) && !empty($config['api'])){
    //         $this->_api($config['api']);
    //     }
    }

    private function _label($labelConfig){
        if(is_array($labelConfig) && array_key_exists('text',$labelConfig) && !empty($labelConfig['text'])){
            $this->label['text'] = $labelConfig['text'];
           
        }else{
            $this->label['text'] = false;
        }
        if(is_array($labelConfig) && array_key_exists('text2',$labelConfig) && !empty($labelConfig['text2'])){
            $this->label['text2'] = $labelConfig['text2'];
            $this->label['double'] = 'form-check-switchery-double';
           
        }else{
            $this->label['text2'] = false;
            $this->label['double'] =false;
        }
       
        if(is_array($labelConfig) && array_key_exists('stacked',$labelConfig) && !empty($labelConfig['stacked'])){
            $this->label['stacked'] = $labelConfig['stacked'];
        }else{
            $this->label['stacked'] = 'left';
        }
        if(is_array($labelConfig) && array_key_exists('display',$labelConfig) && !empty($labelConfig['display'])){
            $this->label['display'] = $labelConfig['display'];
        }else{
            $this->label['display'] = false;
        }

        if(!is_array($labelConfig) && !empty($labelConfig)){
            $this->label['text'] = 'error: please pass an array';
        }
        
    }
    // private function _field($labelConfig){
    //     if(is_array($labelConfig) && array_key_exists('text',$labelConfig) && !empty($labelConfig['text'])){
    //         $this->label['text'] = $labelConfig['text'];
           
    //     }else{
    //         $this->label['text'] = false;
    //     }
    //     if(is_array($labelConfig) && array_key_exists('stacked',$labelConfig) && !empty($labelConfig['stacked'])){
    //         $this->label['stacked'] = $labelConfig['stacked'];
    //     }else{
    //         $this->label['stacked'] = false;
    //     }

    //     if(!is_array($labelConfig) && !empty($labelConfig)){
    //         $this->label['text'] = 'error: please pass an array';
    //     }
        
    // }
    //     private function _help($helpConfig){
    
    //     if(is_array($helpConfig) && array_key_exists('text',$helpConfig ) && !empty($helpConfig['text'])){
    //         $this->help['text'] = $helpConfig['text'];
    //     }else{
    //         $this->help['text'] = false;
    //     }
    //     if(is_array($helpConfig) && array_key_exists('class',$helpConfig ) && !empty($helpConfig['class'])){
    //         $this->help['class'] = $helpConfig['class'];
    //     }else{
    //         $this->help['class'] = false;
    //     }

    //     if(!is_array($helpConfig) && !empty($helpConfig)){
    //         $this->help['text'] = 'error: please pass an array';
    //     }
        
    // }

    // private function _icon($iconConfig){
    
    //     if(is_array($iconConfig) && array_key_exists('key',$iconConfig ) && !empty($iconConfig['key'])){
    //         $this->icon['key'] = $iconConfig['key'];
    //     }else{
    //         $this->icon['key'] = false;
    //     }
    //     if(is_array($iconConfig) && array_key_exists('align',$iconConfig ) && !empty($iconConfig['align'])){
    //         $this->icon['align'] = $iconConfig['align'];
    //     }else{
    //         $this->icon['align'] = false;
    //     }

    //     if(!is_array($iconConfig) && !empty($iconConfig)){
    //         $this->icon['key'] = 'error: please pass an array';
    //     }
        
    // }

    private function _decoration($decorationConfig){
        if(is_array($decorationConfig) && array_key_exists('style',$decorationConfig ) && !empty($decorationConfig['style'])){
            $this->decoration['style'] = 'form-check-input-'.$decorationConfig['style'];
        }else{
            $this->decoration['style'] = 'form-check-input';
        }
        if(is_array($decorationConfig) && array_key_exists('switch',$decorationConfig ) && !empty($decorationConfig['switch'])){
            $this->decoration['switch'] = 'form-check-input-'.$decorationConfig['switch'];
        }else{
            $this->decoration['switch'] = false;
        }
        // if(is_array($decorationConfig) && array_key_exists('color',$decorationConfig ) && !empty($decorationConfig['color'])){
        //     $this->decoration['color'] = $decorationConfig['color'];
        // }else{
        //     $this->decoration['color'] = false;
        // }
        // if(is_array($decorationConfig) && array_key_exists('switch',$decorationConfig ) && !empty($decorationConfig['switch'])){
        //     $this->decoration['switch'] = 'form-check-input-switch';
        // }else{
        //     $this->decoration['styled'] = 'form-check-input';
        // }


        if(!is_array($decorationConfig) && !empty($decorationConfig)){
            $this->decoration['style'] = 'error: please pass an array';
        }
        
    }

    // private function _grid($gridConfig){
    
    //     if(is_array($gridConfig) && array_key_exists('label',$gridConfig ) && !empty($gridConfig['label'])){
    //         $this->grid['label'] = $gridConfig['label'];
    //     }else{
    //         $this->grid['label'] = false;
    //     }
    //     if(is_array($gridConfig) && array_key_exists('field',$gridConfig ) && !empty($gridConfig['field'])){
    //         $this->grid['field'] = $gridConfig['field'];
    //     }else{
    //         $this->grid['field'] = false;
    //     }

    //     if(!is_array($gridConfig) && !empty($gridConfig)){
    //         $this->icon['field'] = 'error: please pass an array';
    //     }
        
    // }
    // private function _mask($maskConfig){
    
    //     if(is_array($maskConfig) && array_key_exists('key',$maskConfig ) && !empty($maskConfig['key'])){
    //         $this->mask['key'] = $maskConfig['key'];
    //     }else{
    //         $this->mask['key'] = false;
    //     }
 

    //     if(!is_array($maskConfig) && !empty($maskConfig)){
    //         $this->mask['key'] = 'error: please pass an array';
    //     }
        
    // }
    // private function _event($eventConfig){
    
    //     if(is_array($eventConfig) && array_key_exists('onEvent',$eventConfig ) && !empty($eventConfig['onEvent'])){
    //         $this->event['onEvent'] = $eventConfig['onEvent'];
    //     }else{
    //         $this->event['onEvent'] = false;
    //     }
 

    //     if(!is_array($eventConfig) && !empty($eventConfig)){
    //         $this->event['onEvent'] = 'error: please pass an array';
    //     }
        
    // }
    // private function _permission($permissionConfig){
    
    //     if(is_array($permissionConfig) && array_key_exists('r',$permissionConfig ) && !empty($permissionConfig['r'])){
    //         $this->permission['r'] = $permissionConfig['r'];
    //     }else{
    //         $this->permission['r'] = false;
    //     } 

    //     if(!is_array($permissionConfig) && !empty($permissionConfig)){
    //         $this->permission['r'] = 'error: please pass an array';
    //     }
        
    // }
    // private function _lib($libConfig){
    
    //     if(is_array($libConfig) && array_key_exists('js',$libConfig ) && !empty($libConfig['js'])){
    //         $this->lib['js'] = $libConfig['js'];
    //     }else{
    //         $this->lib['js'] = false;
    //     } 
    //     if(is_array($libConfig) && array_key_exists('css',$libConfig ) && !empty($libConfig['css'])){
    //         $this->lib['css'] = $libConfig['css'];
    //     }else{
    //         $this->lib['css'] = false;
    //     } 

    //     if(!is_array($libConfig) && !empty($libConfig)){
    //         $this->lib['js'] = 'error: please pass an array';
    //     }
        
    // }
    // private function _snippet($snippetConfig){
    //     if(array_key_exists('code',$snippetConfig ) && !empty($snippetConfig['code'])){
    //         $this->snippet['code'] = $snippetConfig['code'];
    //     }else{
    //         $this->snippet['code'] =false;
    //     }
    //     if(array_key_exists('apiSnippet',$snippetConfig ) && !empty($snippetConfig['apiSnippet'])){
    //         $this->snippet['apiSnippet'] = $snippetConfig['apiSnippet'];
    //     }else{
    //         $this->snippet['apiSnippet'] =false;
    //     }
    // }

    // private function _api($apiConfig){
    //     if(is_array($apiConfig) && array_key_exists('get',$apiConfig ) && !empty($apiConfig['get'])){
    //         $this->api['get'] = $apiConfig['get'];
    //     }else{
    //         $this->api['get'] = false;
    //     }
    //     if(is_array($apiConfig) && array_key_exists('post',$apiConfig ) && !empty($apiConfig['post'])){
    //         $this->api['post'] = $apiConfig['post'];
    //     }else{
    //         $this->api['post'] = false;
    //     }
    //     if(is_array($apiConfig) && array_key_exists('token',$apiConfig ) && !empty($apiConfig['token'])){
    //         $this->api['token'] = $apiConfig['token'];
    //     }else{
    //         $this->api['token'] = false;
    //     }

    //     if(!is_array($apiConfig) && !empty($apiConfig)){
    //         $this->api['get'] = $apiConfig;
    //     }
        
    // }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {      

        return view('dataentry::components.elements.data-entry.form.basic-inputs.checkbox');
    
    }
}