<?php

namespace Themegenie\LimitlessMaterial\App\View\Components\Layouts\Partials;

use Exception;
use Illuminate\Support\Facades\DB;
use Themegenie\LimitlessMaterial\App\View\Components\LayoutComponent;

class Title extends LayoutComponent
{
   
    public $title = "MedWeb";
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */

    public function __construct()
    {
        // TODO Applay caching mechanizm using session or redis or memcache
        // TODO use log for exception 
        if(config('genie.db.title'))
        {
            try{
                $setup = DB::table('core_configs')->where('key', 'title')->first();
                if(!is_null($setup)) {
                    $this->title = $setup->value;
                }
            }catch(Exception $e){
                dd($e);
                // (Schema::hasTable('core_configs'))
            }
        }


    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
    
        return view('limitlessmaterial::components.layouts.partials.title', ['title'=>$this->title]);
    }
}