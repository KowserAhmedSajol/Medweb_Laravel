<?php

namespace Themegenie\Actions\App\View\Components\Elements\Links;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Http;
use Themegenie\LimitlessMaterial\App\View\Components\BaseComponent;

class LinkHistory extends BaseComponent
{
    public $data = [];
    public $unique_identifier = '';
    public $column_mapping_data = '';
    public $api_end_point = '';
    public $readonly, $editable, $datalist, $selected;
    public function __construct($uuid, $api, $readonly = true, $editable = false, $datalist = false, $selected = null)
    {
        $this->data['unique_identifier'] = $this->unique_identifier = str_replace('-', '_', $uuid);
        $this->data['api_end_point'] = $this->api_end_point = "$api/$uuid";
        $this->data['column_mapping_data'] = $this->column_mapping_data = ["body"];
        $this->data['permission'] = $this->readonly = $readonly;
        $this->data['permission'] = $this->editable = $editable;
        $this->data['permission'] = 'none';
        $this->data['datalist'] = $this->datalist = $datalist;
        $this->data['selected'] = $this->selected = $selected;
    }

    public function render()
    {
        return view('actions::components.elements.links.link-history')->with([
                        'data' => $this->data
                    ]);
        // try{
        //     $response = Http::get($this->api_end_point);
        //     if($response->status() == 200){
        //         $this->data = json_decode($response->body(),true);
        //         return view('Themegeniematerial::components.elements.modal-history')->with([
        //             'data' => $this->data
        //         ]);
        //     }
        //     return view('Themegeniematerial::components.elements.modal-history')->with([
        //         'data' => $response->status()
        //     ]);
        // }catch(Exception $e){
        //     dd($e);
        // }

    }
}
