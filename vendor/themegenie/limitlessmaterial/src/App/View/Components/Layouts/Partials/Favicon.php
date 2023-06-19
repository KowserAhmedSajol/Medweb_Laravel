<?php

namespace Themegenie\LimitlessMaterial\App\View\Components\Layouts\Partials;

use Exception;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Favicon extends Component
{
    public $icon = "vendor/limitlessmaterial/global_assets/images/favicon.ico";
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */

    public function __construct()
    {
        if(config('genie.db.favicon'))
        {
            try{
                $setup = DB::table('core_configs')->where('key', 'favicon')->first();
                if(!is_null($setup)) {
                    $this->icon = $setup->value;
                }
            }catch(Exception $e){
                dd($e);
                // (Schema::hasTable('core_configs'))
            }
        }


    }

    public function render()
    {
        return view('limitlessmaterial::components.layouts.partials.favicon');
    }
}
