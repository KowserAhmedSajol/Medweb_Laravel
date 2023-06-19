<?php

namespace Themegenie\DataDisplay;

use Illuminate\Support\ServiceProvider;

class DataDisplayServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'datadisplay');

        $this->commands([
            ##InstallationCommandClass##
        ]);

        $this->datadisplay();
        $this->alerts();

        
        
        
        \Illuminate\Support\Facades\Blade::component('forms.select-datadisplay', \Themegenie\DataDisplay\App\View\Components\Forms\SelectDataDisplay::class);
        ##||ANOTHERCOMPONENT||##
    
    }
    public function register()
    { }

    private function datadisplay(){

        \Illuminate\Support\Facades\Blade::component('sg-card', \Themegenie\DataDisplay\App\View\Components\Cards\Card::class);
        \Illuminate\Support\Facades\Blade::component('sg-table', \Themegenie\DataDisplay\App\View\Components\Tables\Table::class);
        \Illuminate\Support\Facades\Blade::component('sg-thead', \Themegenie\DataDisplay\App\View\Components\Tables\TableHead::class);
        \Illuminate\Support\Facades\Blade::component('sg-tbody', \Themegenie\DataDisplay\App\View\Components\Tables\TableBody::class);

        \Illuminate\Support\Facades\Blade::component('sg-pagination', \Themegenie\DataDisplay\App\View\Components\Pagination::class );
        \Illuminate\Support\Facades\Blade::component('sg-copyright', \Themegenie\DataDisplay\App\View\Components\DataDisplay\Copyright::class );
        \Illuminate\Support\Facades\Blade::component('sg-notification', \Themegenie\DataDisplay\App\View\Components\DataDisplay\Notification::class );

    }

    private function alerts(){
        \Illuminate\Support\Facades\Blade::component('sg-alert-errors', \Themegenie\DataDisplay\App\View\Components\Alerts\Error::class);
        \Illuminate\Support\Facades\Blade::component('sg-alert-message', \Themegenie\DataDisplay\App\View\Components\Alerts\Message::class);
        \Illuminate\Support\Facades\Blade::component('sg-toast', \Themegenie\DataDisplay\App\View\Components\Alerts\ToastComponent::class);

    }
}