<?php

namespace Themegenie\DataDisplay\App\View\Components\DataDisplay;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Copyright extends Component
{
    public $name = "Pondit";
    public $url =  "www.pondit.com";
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */

    public function __construct()
    {
        $this->name = $this->_getTechPatnerName();
        $this->url = $this->_getTechPatnerUrl();

    }

    public function _getTechPatnerName()
    {

        $name = $this->name;
        if (Schema::hasTable('organization_setups')) {
            $setup = DB::table('organization_setups')->where('key', 'tech-partner')->first();
            if(!is_null($setup)) {
                $name = $setup->value;
            }
        }
        return $name;
    }

    public function _getTechPatnerUrl()
    {
        $url = $this->url;
        if (Schema::hasTable('organization_setups')) {
            $setup = DB::table('organization_setups')->where('key', 'tech-partner-url')->first();
            if(!is_null($setup)) {
                $url = $setup->value;
            }
        }
        return $url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('datadisplay::components.datadisplay.copyright');
    }
}