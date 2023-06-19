<?php

namespace Themegenie\DataEntry\App\View\Components\Elements\DataEntry\Exclusive;

use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;
use Illuminate\Support\Str;

class SelecttrioComponent extends Component
{

    public $attributeSet
           ,$picks
           ,$selected
           ,$placeholder
           ,$name
           ,$tableName
           ,$showHidden
           ,$connection
           ,$isGrouped
           ,$childKey
           ,$label
           ,$grid
           ,$api
           ,$uuid;



    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($attributes = [], $selected = null, $name = null, $tableName = null,$connection =false,$showHidden = false,$childKey=false,$isGrouped=false,$label=false,$grid=false,$api=false)
    {
       $this->selected = $selected;
       $this->name = $name;
       $this->placeholder = $attributes['placeholder'] ?? __('Please Select');
       $this->attributeSet = $this->formatAttributes($attributes);
       $this->showHidden = $showHidden;
       $this->connection = $connection;
       $this->childKey = $childKey;
       $this->isGrouped = $isGrouped;
       $this->uuid = Str::uuid();
       $this->api = $api;
       if($api){
            $this->picks = [];
       }else{
            $this->picks = $this->options($tableName);
       }



        if(isset($grid['label']) && isset($grid['field'])){
            $this->_grid($grid);
        }else{
            $this->_grid(['label'=>'col-12','field'=>'col-12']);
        }

        if($label){
            $this->_label($label);
        }
    }



    public function options($tableName){
        $collection = [];

        $table = $tableName;
        $column = 'title';
        $id = 'id';
        $anyColumn = 'uuid';


        if(!$this->column_exists($table,$anyColumn))
        {
            $anyColumn = 1;
        }
        


        if($this->column_exists($table,'title'))
        {
            $column = 'title';
        }elseif($this->column_exists($table,'name'))
        {
            $column = 'name';
        }else{
            return false;
        }

        if($this->connection)
        {
            if( DB::connection($this->connection)->getSchemaBuilder()->hasColumn($table, 'deleted_at') ) 
            {
                $data = DB::connection($this->connection)->table($table)->selectRaw("$id as id, $column as text, $anyColumn as uuid")->whereNull('deleted_at')->get();
            }else{
                $data = DB::connection($this->connection)->table($table)->selectRaw("$id as id, $column as text, $anyColumn as uuid")->get();
            }
        }else
        {
            if( DB::getSchemaBuilder()->hasColumn($table, 'deleted_at') ) 
            {
                $data = DB::table($table)->selectRaw("$id as id, $column as text, $anyColumn as uuid")->whereNull('deleted_at')->get();
            }else{
                $data = DB::table($table)->selectRaw("$id as id, $column as text, $anyColumn as uuid")->get();
            }
        }

        foreach($data as $each)
        {
            $collection[] = ['id'=>$each->id,'uuid'=>$each->uuid,'text'=>$each->text];
        }
        

        return $collection;
    }


    private function column_exists($table,$anyColumn)
    {
        
        // Through DB Facade
        if($this->connection)
        {
            $columns = DB::connection($this->connection)->getSchemaBuilder()->getColumnListing($table);
        }else{
            $columns = DB::getSchemaBuilder()->getColumnListing($table);
        }

        return in_array($anyColumn,$columns);
    }


    private function table_exists($table)
    {
        // Through DB Facade
        if($this->connection)
        {
            $columns = DB::connection($this->connection)->getSchemaBuilder()->getColumnListing($table);
        }else{
            $columns = DB::getSchemaBuilder()->getColumnListing($table);
        }

        if(count($columns)>0){
            return true;
        }else{
            return false;
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

    private function _label($label = []){
    
        if($label){
            $this->label['text'] = $label;
        }else{
            $this->label['text'] = [];
        }
        
    }

    private function _grid($gridConfig = []){
    
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
        return view('dataentry::components.elements.data-entry.exclusive.selecttrio');
    }
}
