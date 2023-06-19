<?php

namespace Themegenie\LimitlessMaterial;

use Illuminate\Support\ServiceProvider;

class LimitlessMaterialServiceProvider extends ServiceProvider
{
    public function boot()
    {

        $this->loadViewsFrom(__DIR__ . '/resources/views', 'limitlessmaterial');

        $this->publishes([__DIR__.'/../stubs/app'    => app_path('./'),], 'app');
        $this->publishes([__DIR__.'/../stubs/config' => config_path('./'),], 'config');
        $this->publishes([__DIR__.'/../stubs/resources/views'  => resource_path('views')], 'views');
        $this->publishes([__DIR__.'/../stubs/public' => public_path('vendor/limitlessmaterial')], 'public');
        
        $this->layouts();
        $this->libs();
        $this->partials();

    }


    public function layouts()
    {
        \Illuminate\Support\Facades\Blade::component('sg-master', \Themegenie\LimitlessMaterial\App\View\Components\Layouts\Master::class);
        \Illuminate\Support\Facades\Blade::component('sg-indexmaster', \Themegenie\LimitlessMaterial\App\View\Components\Layouts\IndexMaster::class);
        \Illuminate\Support\Facades\Blade::component('sg-guest', \Themegenie\LimitlessMaterial\App\View\Components\Layouts\GuestLayout::class);
        \Illuminate\Support\Facades\Blade::component('sg-blank', \Themegenie\LimitlessMaterial\App\View\Components\Layouts\Blank::class);
    }

    private function libs(){
        \Illuminate\Support\Facades\Blade::component('sg-style', \Themegenie\LimitlessMaterial\App\View\Components\Layouts\Libs\Style::class);
        \Illuminate\Support\Facades\Blade::component('sg-js', \Themegenie\LimitlessMaterial\App\View\Components\Layouts\Libs\Js::class);

        \Illuminate\Support\Facades\Blade::component('sg-frontstyle', \Themegenie\LimitlessMaterial\App\View\Components\Layouts\Libs\FrontStyle::class);
        \Illuminate\Support\Facades\Blade::component('sg-frontjs', \Themegenie\LimitlessMaterial\App\View\Components\Layouts\Libs\FrontJs::class);
    }

    private function partials(){
        \Illuminate\Support\Facades\Blade::component('sg-meta', \Themegenie\LimitlessMaterial\App\View\Components\Layouts\Partials\Meta::class);
        \Illuminate\Support\Facades\Blade::component('sg-dummy', \Themegenie\LimitlessMaterial\App\View\Components\Layouts\Partials\Dummy::class);
        \Illuminate\Support\Facades\Blade::component('sg-breadcrumb', \Themegenie\LimitlessMaterial\App\View\Components\Layouts\Partials\Breadcrumb::class);
        \Illuminate\Support\Facades\Blade::component('sg-title', \Themegenie\LimitlessMaterial\App\View\Components\Layouts\Partials\Title::class);
        \Illuminate\Support\Facades\Blade::component('sg-titlebar', \Themegenie\LimitlessMaterial\App\View\Components\Layouts\Partials\Title::class);
        \Illuminate\Support\Facades\Blade::component('sg-favicon', \Themegenie\LimitlessMaterial\App\View\Components\Layouts\Partials\Favicon::class);
        \Illuminate\Support\Facades\Blade::component('sg-navbar', \Themegenie\LimitlessMaterial\App\View\Components\Layouts\Partials\navbar::class);
        \Illuminate\Support\Facades\Blade::component('sg-sidebar', \Themegenie\LimitlessMaterial\App\View\Components\Layouts\Partials\sidebar::class);
        \Illuminate\Support\Facades\Blade::component('sg-footer', \Themegenie\LimitlessMaterial\App\View\Components\Layouts\Partials\footer::class);

        //Frontend
        \Illuminate\Support\Facades\Blade::component('sg-frontnavbar', \Themegenie\LimitlessMaterial\App\View\Components\Layouts\Partials\FrontNavbar::class);
        \Illuminate\Support\Facades\Blade::component('sg-frontslider', \Themegenie\LimitlessMaterial\App\View\Components\Layouts\Partials\FrontSlider::class);
        \Illuminate\Support\Facades\Blade::component('sg-frontservice', \Themegenie\LimitlessMaterial\App\View\Components\Layouts\Partials\FrontService::class);
        \Illuminate\Support\Facades\Blade::component('sg-frontnews', \Themegenie\LimitlessMaterial\App\View\Components\Layouts\Partials\FrontNews::class);
        \Illuminate\Support\Facades\Blade::component('sg-frontmodal', \Themegenie\LimitlessMaterial\App\View\Components\Layouts\Partials\FrontModal::class);
        \Illuminate\Support\Facades\Blade::component('sg-frontappoint', \Themegenie\LimitlessMaterial\App\View\Components\Layouts\Partials\FrontAppoint::class);
        \Illuminate\Support\Facades\Blade::component('sg-frontabout', \Themegenie\LimitlessMaterial\App\View\Components\Layouts\Partials\FrontAbout::class);
        \Illuminate\Support\Facades\Blade::component('sg-frontcontact', \Themegenie\LimitlessMaterial\App\View\Components\Layouts\Partials\FrontContact::class);
        \Illuminate\Support\Facades\Blade::component('sg-frontfooter', \Themegenie\LimitlessMaterial\App\View\Components\Layouts\Partials\FrontFooter::class);

    }

    public function register()
    {

    }
}
