<?php

namespace Themegenie\DataDisplay\App\View\Components\DataDisplay;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FaviconComponent extends Component
{
    public $icon = "vendor/limitlessmaterial/global_assets/images/favicon.ico";
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */

    public function __construct()
    {
        if (Schema::hasTable('organization_setups')) {
            $setup = DB::table('organization_setups')->where('key', 'favicon')->first();
            if(!is_null($setup)) {
                $this->icon = $setup->value;
            }
        }


    }

    public function render()
    {
        return view('datadisplay::components.datadisplay.favicon');
    }
}
