<x-sg-label class="form-label" for="numberOfRowsPerPage" label="{{ __('Rows Per Page') }}" />
<select {{ $attributes->class("form-control select-search")->merge(['']) }}>
        {{-- <option value="">{{__('Choose')}}</option> --}}   
    @if (count($options))
        @foreach ($options as $key => $option)
            @if (isset($selected))
                <option value="{{ $key }}" {{ ($key == $selected) ? "selected" : "" }}>{{ $option }}</option>
            @else
                <option value="{{ $key }}">{{ $option }}</option>
            @endif
        @endforeach
    @endif
</select>
{{-- {!! Form::open() !!} --}}