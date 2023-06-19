@if(array_key_exists('text',$label))
	<div class="form-group row">
		<label class="col-form-label {{$grid['label']}}">{{$label['text']}} <span class='text-danger'>{{isset($attributes['required']) ? '*' : ''}}</span></label>
		<div class="{{$grid['field']}}">
@endif

<select {{ $attributes->class(["form-control"]) }}>
<!-- <select class="form-control form-control-uniform" data-fouc> -->
<!-- <select class="custom-select"> -->
<!-- <select class="form-control form-control-sm"> -->
		<option value="opt1">Default select box</option>
		<option value="opt2">Option 2</option>
		<option value="opt3">Option 3</option>
</select>

@if(array_key_exists('text',$label))
		</div>
	</div>
@endif