@if(array_key_exists("text",$label))
	<div class="form-group row">
		<label class="col-form-label {{$grid['label']}}">{{$label['text']}} <span class='text-danger'>{{isset($attributes['required']) ? '*' : ''}}</span></label>
		<div class="{{$grid['field']}}">
@endif
@if(array_key_exists("w",$permission) && $permission['w']===false)
<span {{ $attributes->class(["form-control"])->merge(['type' => 'color']) }}>{{$attributes['value']}}</span>
@else
<input {{ $attributes->class(["form-control"])->merge(['type' => 'color']) }}>
@endif

@if(array_key_exists("text",$help))
		<span class="form-text {{$help['class']}}">{{$help['text']}}</span>	
@endif
@if(array_key_exists("text",$label))
		</div>
	</div>
@endif