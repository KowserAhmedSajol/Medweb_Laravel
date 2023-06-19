<button {{ $attributes->class(['btn' ,$bg_color, $ele_ml, 'legitRipple'])->merge(['type' => 'button']) }} label={{$label}}>
    {{ $slot }}<i class="{{$icon}} {{$icon_ml}}"></i>
</button>