<?php

namespace Themegenie\DataDisplay\App\View\Components\DataDisplay;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TitleComponent extends Component
{

    public $title = "PONDIT";
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */

    public function __construct()
    {
        if (Schema::hasTable('organization_setups')) {
            $setup = DB::table('organization_setups')->where('key', 'title')->first();
            if(!is_null($setup)) {
                $this->title = $setup->value;
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
        return view('datadisplay::components.datadisplay.title');
    }
}