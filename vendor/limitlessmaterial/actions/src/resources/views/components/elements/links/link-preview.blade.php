@if ($outline)
    @php
        $classes = 'btn 
                    btn-sm 
                    btn-outline 
                    text-blue800 
                    border-2 
                    border-blue-800 
                    btn-icon 
                    rounded-round 
                    legitRipple 
                    shadow 
                    mr-1';
    @endphp
@else
    @php
        $classes = 'btn 
                    btn-sm 
                    bg-blue800 
                    border-2 
                    border-blue-800 
                    btn-icon 
                    rounded-round 
                    legitRipple 
                    shadow 
                    mr-1';
    @endphp
@endif

<a {{ $attributes->class($classes)->merge(['href' => '#']) }}><i class="icon-chopper"></i> {{ $slot }}</a>