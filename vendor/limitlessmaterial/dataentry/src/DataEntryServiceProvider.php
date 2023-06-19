<?php

namespace Themegenie\DataEntry;

use Illuminate\Support\ServiceProvider;

class DataEntryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'dataentry');

        $this->commands([
            ##InstallationCommandClass##
        ]);
    
        $this->formelement();
    
        ##||ANOTHERCOMPONENT||##
    
    }
    public function register()
    { }

    private function formelement(){

        \Illuminate\Support\Facades\Blade::component('dataentry::components.elements.data-entry.options.radio', 'sg-radio');
        // \Illuminate\Support\Facades\Blade::component('dataentry::components.elements.data-entry.options.checkbox', 'sg-checkbox');
        // \Illuminate\Support\Facades\Blade::component('dataentry::components.elements.data-entry.inputs.textarea', 'sg-textarea');
        // \Illuminate\Support\Facades\Blade::component('dataentry::components.elements.data-entry.type-options.week', 'sg-week');
        // \Illuminate\Support\Facades\Blade::component('dataentry::components.elements.data-entry.inputs.number', 'sg-number');
        // \Illuminate\Support\Facades\Blade::component('dataentry::components.elements.data-entry.options.range', 'sg-range');
        // \Illuminate\Support\Facades\Blade::component('dataentry::components.elements.data-entry.inputs.color', 'sg-color');
        // \Illuminate\Support\Facades\Blade::component('dataentry::components.elements.data-entry.inputs.tel', 'sg-tel');
        // \Illuminate\Support\Facades\Blade::component('dataentry::components.elements.data-entry.type-options.search', 'sg-search');
        // \Illuminate\Support\Facades\Blade::component('dataentry::components.elements.data-entry.inputs.url', 'sg-url');

        \Illuminate\Support\Facades\Blade::component('sg-btn-any', \Themegenie\DataEntry\App\View\Components\Elements\Buttons\BtnAny::class);
        \Illuminate\Support\Facades\Blade::component('sg-btn-cancel', \Themegenie\DataEntry\App\View\Components\Elements\Buttons\Cancel::class);
        \Illuminate\Support\Facades\Blade::component('sg-btn-submit', \Themegenie\DataEntry\App\View\Components\Elements\Buttons\Submit::class);
        \Illuminate\Support\Facades\Blade::component('sg-btn-delete', \Themegenie\DataEntry\App\View\Components\Elements\Buttons\Delete::class);
        \Illuminate\Support\Facades\Blade::component('sg-label', \Themegenie\DataEntry\App\View\Components\Elements\DataDisplay\Label::class);

        \Illuminate\Support\Facades\Blade::component('sg-rowsperpage', \Themegenie\DataEntry\App\View\Components\Elements\DataEntry\ExtendedOptions\RowsPerPage::class);
        \Illuminate\Support\Facades\Blade::component('sg-daterange', \Themegenie\DataEntry\App\View\Components\Elements\DataEntry\ExtendedOptions\DateRange::class);

        //sanjida

        \Illuminate\Support\Facades\Blade::component('sg-text',\Themegenie\DataEntry\App\View\Components\Elements\DataEntry\BasicInputs\Text::class);
        // \Illuminate\Support\Facades\Blade::component('sg-textarea',\Themegenie\DataEntry\App\View\Components\Elements\DataEntry\BasicInputs\Textarea::class);
        \Illuminate\Support\Facades\Blade::component('dataentry::components.elements.data-entry.form.basic-inputs.textarea', 'sg-textarea');
        \Illuminate\Support\Facades\Blade::component('sg-number',\Themegenie\DataEntry\App\View\Components\Elements\DataEntry\BasicInputs\Number::class);
        \Illuminate\Support\Facades\Blade::component('sg-email',\Themegenie\DataEntry\App\View\Components\Elements\DataEntry\BasicInputs\Email::class);
        \Illuminate\Support\Facades\Blade::component('sg-url',\Themegenie\DataEntry\App\View\Components\Elements\DataEntry\BasicInputs\Url::class);
        \Illuminate\Support\Facades\Blade::component('sg-search',\Themegenie\DataEntry\App\View\Components\Elements\DataEntry\BasicInputs\Search::class);
        \Illuminate\Support\Facades\Blade::component('sg-tel',\Themegenie\DataEntry\App\View\Components\Elements\DataEntry\BasicInputs\Tel::class);
        \Illuminate\Support\Facades\Blade::component('sg-color',\Themegenie\DataEntry\App\View\Components\Elements\DataEntry\BasicInputs\Color::class);
        \Illuminate\Support\Facades\Blade::component('sg-datetime',\Themegenie\DataEntry\App\View\Components\Elements\DataEntry\BasicInputs\DateTime::class);
        \Illuminate\Support\Facades\Blade::component('sg-date',\Themegenie\DataEntry\App\View\Components\Elements\DataEntry\BasicInputs\Date::class);
        \Illuminate\Support\Facades\Blade::component('sg-time',\Themegenie\DataEntry\App\View\Components\Elements\DataEntry\BasicInputs\Time::class);
        \Illuminate\Support\Facades\Blade::component('sg-month',\Themegenie\DataEntry\App\View\Components\Elements\DataEntry\BasicInputs\Month::class);
        \Illuminate\Support\Facades\Blade::component('sg-week',\Themegenie\DataEntry\App\View\Components\Elements\DataEntry\BasicInputs\Week::class);
        \Illuminate\Support\Facades\Blade::component('sg-range',\Themegenie\DataEntry\App\View\Components\Elements\DataEntry\BasicInputs\Range::class);
        \Illuminate\Support\Facades\Blade::component('sg-password',\Themegenie\DataEntry\App\View\Components\Elements\DataEntry\BasicInputs\Password::class);
        \Illuminate\Support\Facades\Blade::component('sg-checkbox',\Themegenie\DataEntry\App\View\Components\Elements\DataEntry\BasicInputs\Checkbox::class);
        \Illuminate\Support\Facades\Blade::component('sg-select',\Themegenie\DataEntry\App\View\Components\Elements\DataEntry\Options\Select::class);

        \Illuminate\Support\Facades\Blade::component('sg-search-select', \Themegenie\DataEntry\App\View\Components\Elements\DataEntry\Exclusive\SearchSelectComponent::class);
        \Illuminate\Support\Facades\Blade::component('sg-selecttrio', \Themegenie\DataEntry\App\View\Components\Elements\DataEntry\Exclusive\SelecttrioComponent::class);
        \Illuminate\Support\Facades\Blade::component('sg-search-select-dd', \Themegenie\DataEntry\App\View\Components\Elements\DataEntry\Exclusive\SearchSelectDdComponent::class);
        \Illuminate\Support\Facades\Blade::component('sg-comment', \Themegenie\DataEntry\App\View\Components\Elements\DataEntry\Comment::class);

    }
}