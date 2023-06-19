<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $decoration= [
        'class' => [
            'formfooter'       => 'col-md-12 text-right',
            'elementwrapper'   => 'col-md-4',
            'elementcontainer' => 'mb-0'
        ]
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('decoration', $this->decoration);
    }
}
