@if ($outline)
    @php
        $classes = 'btn 
                    btn-sm 
                    btn-outline 
                    text-success 
                    border-2 
                    border-success 
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
                    bg-success 
                    border-2 
                    border-success 
                    btn-icon 
                    rounded-round 
                    legitRipple 
                    shadow 
                    mr-1';
    @endphp
@endif

<a {{ $attributes->class($classes)->merge(['href' => '#']) }}><i class="icon-eye"></i> {{ $slot }}</a>