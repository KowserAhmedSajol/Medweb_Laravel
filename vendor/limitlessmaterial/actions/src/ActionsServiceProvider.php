<?php

namespace Themegenie\Actions;

use Illuminate\Support\ServiceProvider;

class ActionsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'actions');

        $this->commands([
            ##InstallationCommandClass##
        ]);

        $this->lnk();

        $this->buttons();

        \Illuminate\Support\Facades\Blade::component('forms.select-action', \Themegenie\Actions\App\View\Components\Forms\SelectAction::class);
        ##||ANOTHERCOMPONENT||##
    
    }
    public function register()
    { }

    private function lnk(){

        \Illuminate\Support\Facades\Blade::component('sg-link-cancel', \Themegenie\Actions\App\View\Components\Elements\Links\LinkCancel::class);
        \Illuminate\Support\Facades\Blade::component('sg-link-create', \Themegenie\Actions\App\View\Components\Elements\Links\LinkCreate::class);
        \Illuminate\Support\Facades\Blade::component('sg-link-edit', \Themegenie\Actions\App\View\Components\Elements\Links\LinkEdit::class);
        \Illuminate\Support\Facades\Blade::component('sg-link-show', \Themegenie\Actions\App\View\Components\Elements\Links\LinkShow::class);
        \Illuminate\Support\Facades\Blade::component('sg-link-list', \Themegenie\Actions\App\View\Components\Elements\Links\LinkList::class);
        \Illuminate\Support\Facades\Blade::component('sg-link-history', \Themegenie\Actions\App\View\Components\Elements\Links\LinkHistory::class);
        \Illuminate\Support\Facades\Blade::component('sg-link-preview', \Themegenie\Actions\App\View\Components\Elements\Links\LinkPreview::class);
        \Illuminate\Support\Facades\Blade::component('sg-link-tree', \Themegenie\Actions\App\View\Components\Elements\Links\LinkTree::class);

    }

    public function buttons()
    {
        \Illuminate\Support\Facades\Blade::component('sg-button', \Themegenie\Actions\App\View\Components\Elements\Actions\Button::class);
        \Illuminate\Support\Facades\Blade::component('sg-alpha-static', \Themegenie\Actions\App\View\Components\Elements\Actions\AlphaStatic::class);
        \Illuminate\Support\Facades\Blade::component('sg-alpha-with-border', \Themegenie\Actions\App\View\Components\Elements\Actions\AlphaWithBorder::class);
        \Illuminate\Support\Facades\Blade::component('sg-border-radius', \Themegenie\Actions\App\View\Components\Elements\Actions\BorderRadius::class);
        \Illuminate\Support\Facades\Blade::component('sg-button-dropdown', \Themegenie\Actions\App\View\Components\Elements\Actions\ButtonDropdown::class);
        \Illuminate\Support\Facades\Blade::component('sg-button-dropup', \Themegenie\Actions\App\View\Components\Elements\Actions\ButtonDropup::class);
        \Illuminate\Support\Facades\Blade::component('sg-button-group-nesting', \Themegenie\Actions\App\View\Components\Elements\Actions\ButtonGroupNesting::class);
        \Illuminate\Support\Facades\Blade::component('sg-button-group', \Themegenie\Actions\App\View\Components\Elements\Actions\ButtonGroup::class);
        \Illuminate\Support\Facades\Blade::component('sg-button-toolbar', \Themegenie\Actions\App\View\Components\Elements\Actions\ButtonToolbar::class);
        \Illuminate\Support\Facades\Blade::component('sg-checkbox-button-group', \Themegenie\Actions\App\View\Components\Elements\Actions\CheckboxButtonGroup::class); 
        \Illuminate\Support\Facades\Blade::component('sg-colored-button', \Themegenie\Actions\App\View\Components\Elements\Actions\ColoredButton::class);
        \Illuminate\Support\Facades\Blade::component('sg-colored-with-icon', \Themegenie\Actions\App\View\Components\Elements\Actions\ColoredWithIcon::class);
        \Illuminate\Support\Facades\Blade::component('sg-colored-with-menu', \Themegenie\Actions\App\View\Components\Elements\Actions\ColoredWithMenu::class);
        \Illuminate\Support\Facades\Blade::component('sg-custom-brown-color', \Themegenie\Actions\App\View\Components\Elements\Actions\CustomBrownColor::class);
        \Illuminate\Support\Facades\Blade::component('sg-custom-pink-color', \Themegenie\Actions\App\View\Components\Elements\Actions\CustomPinkColor::class);
        \Illuminate\Support\Facades\Blade::component('sg-custom-teal-color', \Themegenie\Actions\App\View\Components\Elements\Actions\CustomTealColor::class);
        \Illuminate\Support\Facades\Blade::component('sg-default-button-sizes', \Themegenie\Actions\App\View\Components\Elements\Actions\DefaultButtonSizes::class);
        \Illuminate\Support\Facades\Blade::component('sg-default-button', \Themegenie\Actions\App\View\Components\Elements\Actions\DefaultButton::class);
        \Illuminate\Support\Facades\Blade::component('sg-default-colors-with-icon', \Themegenie\Actions\App\View\Components\Elements\Actions\DefaultColorsWithIcon::class);
        \Illuminate\Support\Facades\Blade::component('sg-default-colors-with-menu', \Themegenie\Actions\App\View\Components\Elements\Actions\DefaultColorsWithMenu::class);
        \Illuminate\Support\Facades\Blade::component('sg-default-colors', \Themegenie\Actions\App\View\Components\Elements\Actions\DefaultColors::class);
        \Illuminate\Support\Facades\Blade::component('sg-default-with-icon', \Themegenie\Actions\App\View\Components\Elements\Actions\DefaultWithIcon::class);
        \Illuminate\Support\Facades\Blade::component('sg-default-with-menu', \Themegenie\Actions\App\View\Components\Elements\Actions\DefaultWithMenu::class);
        \Illuminate\Support\Facades\Blade::component('sg-drop-left', \Themegenie\Actions\App\View\Components\Elements\Actions\Dropleft::class);
        \Illuminate\Support\Facades\Blade::component('sg-drop-right', \Themegenie\Actions\App\View\Components\Elements\Actions\DropRight::class);
    }
}