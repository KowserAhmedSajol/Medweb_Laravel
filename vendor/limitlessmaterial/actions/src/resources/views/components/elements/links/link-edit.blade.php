@if ($outline)
    @php
        $classes = 'btn btn-sm btn-outline text-primary border-2 border-primary btn-icon rounded-round legitRipple shadow mr-1';
    @endphp
@else
    @php
        $classes = 'btn btn-sm bg-primary border-2 border-primary btn-icon rounded-round legitRipple shadow mr-1';
    @endphp
@endif

<a {{ $attributes->class($classes)->merge(['href' => '#']) }}><i class="icon-pen"></i> {{ $slot }}</a>