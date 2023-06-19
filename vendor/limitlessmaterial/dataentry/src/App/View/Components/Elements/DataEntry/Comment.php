<?php

namespace Themegenie\DataEntry\App\View\Components\Elements\DataEntry;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Comment extends Component
{
    public $label      = []; //['text' =>__('Email'),'direction' =>  'horizontal' ]

    public $field      ='text'; //['id', 'name', 'placeholder', 'value'] ['readonly', 'disabled', 'autocomplete', 'required'] ['class for field']
    public $help       = []; //['text' => __('e.g john@gmail.com'), 'class'=>'abc']
    public $icon       = []; //['key' =>'icon-envelop2', 'align'=>'left']
    public $decoration = false; // ['class' => '', 'style' => 'inline css']
    public $grid       = []; //['label'=>'col-12', 'field' =>'col-12']

    public $validation; //['key'=>'email validation', 'rule'=> ['rule1','rule2'], 'error'=>'text', 'instruction'=>'validation instruction']

    public $mask       = false; //['key'=>'value'] 

    public $event      = false; //['onEvent'=>['handler1', 'handler2']];

    public $permission = []; // ['r'=true, 'w'] 

    public $lib        = false; //['js'=> [], 'css'=> []]

    public $snippet    = false; //['code'=>'code block', 'apiSnippet' => 'url']

    public $api        = false; //['get'=>'', 'post'=>'', 'token'=>'']
    public $scopes     = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct($config=[])
    {

        if(is_array($config) && array_key_exists('label',$config ) && !empty($config['label'])){
            $this->_label($config['label']);
        }
        if(is_array($config) && array_key_exists('help',$config ) && !empty($config['help'])){
            $this->_help($config['help']);
        }
        if(is_array($config) && array_key_exists('icon',$config ) && !empty($config['icon'])){
            $this->_icon($config['icon']);
        }
        if(is_array($config) && array_key_exists('decoration',$config ) && !empty($config['decoration'])){
            $this->_decoration($config['decoration']);
        }
        if(is_array($config) && array_key_exists('grid',$config ) && !empty($config['grid'])){
            $this->_grid($config['grid']);
        }
        if(is_array($config) && array_key_exists('mask',$config ) && !empty($config['mask'])){
            $this->_mask($config['mask']);
        }
        if(is_array($config) && array_key_exists('event',$config ) && !empty($config['event'])){
            $this->_event($config['event']);
        }
        if(is_array($config) && array_key_exists('permission',$config ) && !empty($config['permission'])){
            $this->_permission($config['permission']);
        }
        if(is_array($config) && array_key_exists('lib',$config ) && !empty($config['lib'])){
            $this->_lib($config['lib']);
        }
        if(is_array($config) && array_key_exists('snippet',$config ) && !empty($config['snippet'])){
            $this->_snippet($config['snippet']);
        }
        if(is_array($config) && is_array($config) && array_key_exists('api',$config ) && !empty($config['api'])){
            $this->_api($config['api']);
        }

        if(is_array($config) && is_array($config) && array_key_exists('scopeableId',$config ) && !empty($config['scopeableId'])){
            $this->scopes['scopeableId'] = $config['scopeableId'];
        }

        if(is_array($config) && is_array($config) && array_key_exists('scopeableUuid',$config ) && !empty($config['scopeableUuid'])){
            $this->scopes['scopeableUuid'] = $config['scopeableUuid'];
        }

        if(is_array($config) && is_array($config) && array_key_exists('scopeableType',$config ) && !empty($config['scopeableType'])){
            $this->scopes['scopeableType'] = $config['scopeableType'];
        }

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
    private function _help($helpConfig){
    
        if(is_array($helpConfig) && array_key_exists('text',$helpConfig ) && !empty($helpConfig['text'])){
            $this->help['text'] = $helpConfig['text'];
        }else{
            $this->help['text'] = false;
        }
        if(is_array($helpConfig) && array_key_exists('class',$helpConfig ) && !empty($helpConfig['class'])){
            $this->help['class'] = $helpConfig['class'];
        }else{
            $this->help['class'] = false;
        }

        if(!is_array($helpConfig) && !empty($helpConfig)){
            $this->help['text'] = 'error: please pass an array';
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
            $this->icon['align'] = false;
        }

        if(!is_array($iconConfig) && !empty($iconConfig)){
            $this->icon['key'] = 'error: please pass an array';
        }
        
    }

    private function _decoration($decorationConfig){
    
        if(is_array($decorationConfig) && array_key_exists('label',$decorationConfig ) && !empty($decorationConfig['class'])){
            $this->decoration['class'] = $decorationConfig['class'];
        }else{
            $this->decoration['class'] = false;
        }
        if(is_array($decorationConfig) && array_key_exists('style',$decorationConfig ) && !empty($decorationConfig['style'])){
            $this->decoration['style'] = $decorationConfig['style'];
        }else{
            $this->decoration['style'] = false;
        }

        if(!is_array($decorationConfig) && !empty($decorationConfig)){
            $this->decoration['class'] = 'error: please pass an array';
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

        if(!is_array($gridConfig) && !empty($gridConfig)){
            $this->icon['field'] = 'error: please pass an array';
        }
        
    }
    private function _mask($maskConfig){
    
        if(is_array($maskConfig) && array_key_exists('key',$maskConfig ) && !empty($maskConfig['key'])){
            $this->mask['key'] = $maskConfig['key'];
        }else{
            $this->mask['key'] = false;
        }
 

        if(!is_array($maskConfig) && !empty($maskConfig)){
            $this->mask['key'] = 'error: please pass an array';
        }
        
    }
    private function _event($eventConfig){
    
        if(is_array($eventConfig) && array_key_exists('onEvent',$eventConfig ) && !empty($eventConfig['onEvent'])){
            $this->event['onEvent'] = $eventConfig['onEvent'];
        }else{
            $this->event['onEvent'] = false;
        }
 

        if(!is_array($eventConfig) && !empty($eventConfig)){
            $this->event['onEvent'] = 'error: please pass an array';
        }
        
    }
    private function _permission($permissionConfig){
    
        if(is_array($permissionConfig) && array_key_exists('r',$permissionConfig ) && !empty($permissionConfig['r'])){
            $this->permission['r'] = $permissionConfig['r'];
        }else{
            $this->permission['r'] = false;
        } 

        if(!is_array($permissionConfig) && !empty($permissionConfig)){
            $this->permission['r'] = 'error: please pass an array';
        }
        
    }
    private function _lib($libConfig){
    
        if(is_array($libConfig) && array_key_exists('js',$libConfig ) && !empty($libConfig['js'])){
            $this->lib['js'] = $libConfig['js'];
        }else{
            $this->lib['js'] = false;
        } 
        if(is_array($libConfig) && array_key_exists('css',$libConfig ) && !empty($libConfig['css'])){
            $this->lib['css'] = $libConfig['css'];
        }else{
            $this->lib['css'] = false;
        } 

        if(!is_array($libConfig) && !empty($libConfig)){
            $this->lib['js'] = 'error: please pass an array';
        }
        
    }
    private function _snippet($snippetConfig){
        if(is_array($snippetConfig) && array_key_exists('code',$snippetConfig ) && !empty($snippetConfig['code'])){
            $this->snippet['code'] = $snippetConfig['code'];
        }else{
            $this->snippet['code'] =false;
        }
        if(is_array($snippetConfig) && array_key_exists('apiSnippet',$snippetConfig ) && !empty($snippetConfig['apiSnippet'])){
            $this->snippet['apiSnippet'] = $snippetConfig['apiSnippet'];
        }else{
            $this->snippet['apiSnippet'] =false;
        }
    }

    private function _api($apiConfig){
        if(is_array($apiConfig) && array_key_exists('get',$apiConfig ) && !empty($apiConfig['get'])){
            $this->api['get'] = $apiConfig['get'];
        }else{
            $this->api['get'] = false;
        }
        if(is_array($apiConfig) && array_key_exists('post',$apiConfig ) && !empty($apiConfig['post'])){
            $this->api['post'] = $apiConfig['post'];
        }else{
            $this->api['post'] = false;
        }
        if(is_array($apiConfig) && array_key_exists('token',$apiConfig ) && !empty($apiConfig['token'])){
            $this->api['token'] = $apiConfig['token'];
        }else{
            $this->api['token'] = false;
        }

        if(!is_array($apiConfig) && !empty($apiConfig)){
            $this->api['get'] = $apiConfig;
        }
        
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    { 
        if((array_key_exists('scopeableId',$this->scopes) && array_key_exists('scopeableType',$this->scopes)) && Auth::user()){
            return view('dataentry::components.elements.data-entry.comment');
        }else
        {
            return false;
        }
    }
}