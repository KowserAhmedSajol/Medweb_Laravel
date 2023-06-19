<?php

namespace Themegenie\LimitlessMaterial\App\View\Components;

use Illuminate\View\Component;

abstract class BaseComponent extends Component
{
    public $renderComponent     = false;

    protected $color_teal800    = 'teal-800';
    protected $color_indigo800  = 'indigo-800';
    protected $color_brown800   = 'brown-800';
    protected $color_blue800    = 'blue-800';

    protected $icon_create      = '';
    protected $icon_list        = '';
    protected $icon_edit        = '';
    protected $icon_show        = '';
    protected $icon_delete      = '';
    protected $icon_history     = '';
    protected $icon_restore     = '';
    protected $icon_softdelete  = '';

    protected $icon_file        = '';
    protected $icon_image       = '';
    protected $icon_video       = '';
    protected $icon_audio       = '';
    protected $icon_word        = '';
    protected $icon_exel        = '';
    protected $icon_pdf         = '';
    protected $icon_text        = '';
    protected $icon_microphone  = '';

    protected $icon_ml          = 'ml-1';
    protected $ele_ml           = 'ml-0';



}
