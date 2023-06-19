@if(array_key_exists("text",$label))
	@if(array_key_exists("field",$grid) || array_key_exists("label",$grid))
	<div class="form-group row">
	@endif
		<label for="{{$attributes['id']}}" class="col-form-label {{array_key_exists('label',$grid) ? $grid['label'] : ''}}">{{$label['text']}} <span class='text-danger'>{{isset($attributes['required']) ? '*' : ''}}</span></label>
		@if(array_key_exists("field",$grid))
			<div class="{{$grid['field']}}">
		@endif
@endif
@if(array_key_exists("key",$icon) && !empty($icon['key']))
	<div class="form-group form-group-feedback form-group-feedback-{{$icon['align']}}">
@endif
@if(array_key_exists('r',$permission) && $permission["r"])
<span {{ $attributes->class(["form-control"])->merge(['type' => 'text']) }}>{{$attributes['value']}}</span>
@else
<input {{ $attributes->class(["form-control"])->merge(['type' => 'text']) }}>
@endif
@if(array_key_exists("key",$icon) && !empty($icon['key']))
	<div class="form-control-feedback form-control-feedback-lg">
			<i class="{{$icon['key']}}"></i>
	</div>
@endif
@if(array_key_exists("text",$help))
		<span class="form-text {{$help['class']}}">{{$help['text']}}</span>	
@endif
@if(array_key_exists("key",$icon) && !empty($icon['key']))
	</div>
@endif
@if(array_key_exists("text",$label))
	@if(array_key_exists("field",$grid))
		</div>
	@endif
	@if(array_key_exists("field",$grid) || array_key_exists("label",$grid))
	</div>
	@endif
@endif

