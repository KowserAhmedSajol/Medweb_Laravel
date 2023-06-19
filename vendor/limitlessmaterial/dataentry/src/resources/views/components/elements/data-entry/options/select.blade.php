@if($attributeSet == "")
    <sapn class="text-warning">Please Pass Attribute Arry as shown :attributes="['name' => 'field_name', 'class' => ' ', 'id' => 'filed_id']"</sapn>
@else

    @if(isset($label) && is_array($label) && array_key_exists("text",$label))
        <div class="form-group row">
            <label for="{{$attributes['id']}}" class="col-form-label {{$grid['label']}}">{{$label['text']}} <span class='text-danger'>{{isset($attributes['required']) ? '*' : ''}}</span></label>
            <div class="{{$grid['field']}}">
    @endif

                <select {!! $attributeSet !!} >
                    @if(isset($placeholder))
                        <option value="">{{$placeholder}}</option>
                    @else
                        <option value="">Please Select Any</option>
                    @endif

                    @if ($options)
                        @foreach ($options as $key => $option)
                            @if (isset($selected))
                                <option value="{{ $key }}" {{ ($key == $selected) ? "selected" : "" }}>{{ $option }}</option>
                            @else
                                <option value="{{ $key }}">{{ $option }}</option>
                            @endif
                        @endforeach
                    @endif
                </select>

    @if(isset($label) && is_array($label) && array_key_exists("text",$label))
            </div>
        </div>
    @endif

@endif
{{-- {!! Form::open() !!} --}}

@push('js')
    <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
    <script>
        (function($){
            $(document).ready(()=>{
                $("select").select2({
                    placeholder: "{{$placeholder}}" != "" ? "{{$placeholder}}" : "Please Select",
                    allowClear: true
                });              
            });
        })(jQuery)

    </script>
@endpush
