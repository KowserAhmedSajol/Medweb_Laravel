@if ($outline)
    @php
        $classes = 'btn 
                    btn-sm btn-outline 
                    text-indigo 
                    border-2 
                    border-indigo 
                    btn-icon 
                    rounded-round 
                    legitRipple 
                    shadow 
                    mr-1';
    @endphp
@else
    @php
        $classes = 'btn 
                    btn-sm bg-indigo 
                    border-2 
                    border-indigo 
                    btn-icon 
                    rounded-round 
                    legitRipple 
                    shadow 
                    mr-1';
    @endphp
@endif

<a {{ $attributes->class($classes)->merge(['href' => '#']) }}>
    <i class="icon-list"></i> 
    {{ $slot }}
</a>