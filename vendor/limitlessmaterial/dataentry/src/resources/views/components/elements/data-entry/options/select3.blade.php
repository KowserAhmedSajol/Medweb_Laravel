<select {!! $attributeSet !!}>
    <option value="">{{ $placeholder ?? 'Select One' }}</option>
     @foreach ($options as $key =>$value)
     <option
        @if(is_array($selected))
             {{ in_array($key, $selected) ? 'selected' : '' }}
         @else
            {{ $key == $selected ? 'selected' : '' }}
         @endif
         value="{{$key}}"
     >
         {{$value}}
     </option>
     @endforeach
 </select>
