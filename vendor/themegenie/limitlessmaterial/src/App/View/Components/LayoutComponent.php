<?php

namespace Themegenie\LimitlessMaterial\App\View\Components;

use Illuminate\View\Component;
use Themegenie\LimitlessMaterial\App\View\Components\BaseComponent;


abstract class LayoutComponent extends BaseComponent
{

    protected $display = false;
    protected $config_layout = [

        'header' => true,
        'subheader' => true,
        'footer' => true,
        'pageHeader' => true,
        'sidebar' => true,
        'sidebarRight' => true,

    ];

}
