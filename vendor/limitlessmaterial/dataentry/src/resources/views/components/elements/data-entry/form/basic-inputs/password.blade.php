@if(array_key_exists("text",$label))
	<div class="form-group row">
		<label class="col-form-label {{$grid['label']}}">{{$label['text']}} <span class='text-danger'>{{isset($attributes['required']) ? '*' : ''}}</span></label>
		<div class="{{$grid['field']}}">
@endif
@if(array_key_exists("key",$icon))

	<div class="form-group form-group-feedback form-group-feedback-{{$icon['align']}}">
@endif
@if(array_key_exists("w",$permission) && $permission['w']===false)
<span {{ $attributes->class(["form-control"])->merge(['type' => 'password']) }}>{{$attributes['value']}}</span>
@else
<input {{ $attributes->class(["form-control"])->merge(['type' => 'password']) }}>
@endif
@if(array_key_exists("key",$icon))
	<div class="form-control-feedback form-control-feedback-lg">
			<i class="{{$icon['key']}}"></i>
	</div>
@endif
@if(array_key_exists("text",$help))
		<span class="form-text {{$help['class']}}">{{$help['text']}}</span>	
@endif
@if(array_key_exists("key",$icon))
	</div>
@endif
@if(array_key_exists("text",$label))
		</div>
	</div>
@endif

@push('js')
    <script>
        (function($){
            $(document).ready(()=>{
                $(document).on('change', '.password', passValidation)
            })
         })(jQuery)

         const passValidation = (event) =>{
            let elm = event.target;
            let passValue = $(elm).val();
            let regPattern = /^(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,20}$/;

            if(!regPattern.test(passValue)){
                $(elm).removeClass('border-success');
                $(elm).addClass('border-danger');
               let formGroup = $(elm).closest('.form-group-feedback');
               $(formGroup).find('.form-control-feedback').html('<i class="icon-cancel-circle2 text-danger"></i>')
               $(formGroup).find('.errMsg').html('<span class="text-danger">Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</span>')

            }else{
                $(elm).removeClass('border-danger');
                $(elm).addClass('border-success');
               let formGroup = $(elm).closest('.form-group-feedback');
               $(formGroup).find('.form-control-feedback').html('<i class="icon-checkmark-circle text-success"></i>')
               $(formGroup).find('.errMsg').html('<span class="text-success">Validation Success</span>')
            }
         }
    </script>
@endpush