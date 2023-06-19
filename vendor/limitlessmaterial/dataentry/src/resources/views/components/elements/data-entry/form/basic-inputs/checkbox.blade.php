@if(array_key_exists('switch',$decoration))
<div class="form-check form-check-switchery {{ $label['double']}} form-check-switch form-check-{{$label['display']}} form-check-{{$label['stacked']}} ">
@else
<div class="form-check form-check-{{$label['stacked']}} form-check-{{$label['display']}}">
@endif
	<label class="form-check-label">
        @if(array_key_exists('stacked',$label) && $label['stacked']==='right')
            {{$label['text']}}
        @endif
        @if(array_key_exists('text2',$label) && $label['text2'])
            {{$label['text2']}}
        @endif
		
		@if(array_key_exists('switch',$decoration))
			<input {{ $attributes->class([$decoration['switch']])->merge(['type' => 'checkbox']) }} data-fouc />	
		@else
		<input {{ $attributes->class([$decoration['style']])->merge(['type' => 'checkbox']) }}/>
		@endif

        @if(array_key_exists('stacked',$label) && $label['stacked']==='left')
            {{$label['text']}}
        @endif    
	</label>
</div>


