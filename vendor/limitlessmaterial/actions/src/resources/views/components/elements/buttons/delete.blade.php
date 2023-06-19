@if ($outline)
    @php
         $classes = "btn btn-sm btn-outline text-danger border-2 border-danger btn-icon rounded-round legitRipple shadow mr-1";
    @endphp
@else
    @php
         $classes = "btn btn-sm bg-danger border-2 border-danger btn-icon rounded-round legitRipple shadow mr-1";
    @endphp
@endif

<form action="{{ $action }}" method="post" style="display : inline" {{ $attributes->merge() }}>
    @csrf
    @method('delete')
          <button type="submit" onclick="return confirm('{{__('Are you sure?')}}')" class="{{ $classes }}"><i class="icon-trash"></i>  {{ $slot }}</button>
</form>