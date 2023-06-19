
@if(array_key_exists('text',$label))
	<div class="form-group row">
		<label class="col-form-label {{$grid['label']}}">{{$label['text']}} <span class='text-danger'>{{isset($attributes['required']) ? '*' : ''}}</span></label>
		<div class="{{$grid['field']}}">
@endif
@if(array_key_exists('key',$icon) && !empty($icon['key']))
	<div class="form-group form-group-feedback form-group-feedback-{{$icon['align']}}">
@endif
@if(array_key_exists('r',$permission) && $permission["r"])
<span {{ $attributes->class(["form-control"])->merge(['type' => 'url']) }}>{{$attributes['value']}}</span>
@else
<input {{ $attributes->class(["form-control"])->merge(['type' => 'url']) }}>
@endif
@if(array_key_exists('key',$icon) && !empty($icon['key']))
	<div class="form-control-feedback form-control-feedback-lg">
			<i class="{{$icon['key']}}"></i>
	</div>
@endif
@if(array_key_exists('text',$help))
		<span class="form-text {{$help['class']}}">{{$help['text']}}</span>	
@endif
@if(array_key_exists('key',$icon) && !empty($icon['key']))
	</div>
@endif
@if(array_key_exists('text',$label))
		</div>
	</div>
@endif