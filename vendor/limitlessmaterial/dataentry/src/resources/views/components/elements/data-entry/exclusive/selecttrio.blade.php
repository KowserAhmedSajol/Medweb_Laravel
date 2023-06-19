<div class="section-row">
    @if($name != null)

        @php
            if($isGrouped && $childKey){
                $nameId = $childKey.'['.$name.'_id][]';
                $nameUUID = $childKey.'['.$name.'_uuid][]';
                $nameTitle = $childKey.'['.$name.'_title][]';
            }elseif($isGrouped)
            {
                $nameId = $name.'_id[]';
                $nameUUID = $name.'_uuid[]';
                $nameTitle = $name.'_title[]';
            }elseif($childKey)
            {
                $nameId = $childKey.'['.$name.'_id]';
                $nameUUID = $childKey.'['.$name.'_uuid]';
                $nameTitle = $childKey.'['.$name.'_title]';
            }
            else
            {
                $nameId = $name.'_id';
                $nameUUID = $name.'_uuid';
                $nameTitle = $name.'_title';
            }

            $selectedUuid = '';
            $selectedTitle = '';

        @endphp

        @if($label && array_key_exists("text",$label))
            <div class="form-group row">
                <label class="col-form-label {{$grid['label']}}">{{$label['text']}} <span class='text-danger'>{{isset($attributes['required']) ? '*' : ''}}</span></label>
                <div class="{{$grid['field']}}">
        @endif

                @if($picks || $api)
                    <select {{ $attributes->class("form-control select-section select-search " .$name."-id")->merge(['data-triouuid'=>$uuid]) }}>
                        <option value="">{{$placeholder}}</option>
                        @if($picks) 
                            @foreach ($picks as $pick)
                                @if (isset($selected) && $selected != null)
                                    <option value="{{ $pick['id'] }}" data-uuid={{$pick['uuid']}} {{ ($pick['id'] == $selected) ? "selected" : "" }}>{{ $pick['text'] }}</option>
                                    @php 
                                        if($pick['id'] == $selected){
                                            $selectedUuid   = $pick['uuid'];
                                            $selectedTitle  = $pick['text'];
                                        }
                                    @endphp
                                @else
                                    <option value="{{ $pick['id'] }}" data-uuid={{$pick['uuid']}}>{{ $pick['text'] }}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>

                    @if(isset($selected) && $selected != null)
                        <input type="{{$showHidden == true ? 'text' : 'hidden'}}" class="{{$name}}-id-input" name="{{$nameId}}" value="{{$selected}}">
                        <input type="{{$showHidden == true ? 'text' : 'hidden'}}" class="{{$name}}-uuid-input" name="{{$nameUUID}}" value="{{$selectedUuid}}">
                        <input type="{{$showHidden == true ? 'text' : 'hidden'}}" class="{{$name}}-title-input" name="{{$nameTitle}}" value="{{$selectedTitle}}">
                    @else
                        <input type="{{$showHidden == true ? 'text' : 'hidden'}}" class="{{$name}}-id-input" name="{{$nameId}}">
                        <input type="{{$showHidden == true ? 'text' : 'hidden'}}" class="{{$name}}-uuid-input" name="{{$nameUUID}}">
                        <input type="{{$showHidden == true ? 'text' : 'hidden'}}" class="{{$name}}-title-input" name="{{$nameTitle}}">
                    @endif
                @else
                    <input type="text" class="form-control {{$name}}-title-input" name="{{$nameTitle}}" placeholder="Table Not Found Please Input Manually">
                @endif
        @if($label && array_key_exists("text",$label))
                </div>
            </div>
        @endif

    @else
        <span class="text-warning">Please Pass Name Attribute By Typing (name='your_name')</span>
    @endif
</div>

@push('css')

@endpush

@push('js')
    <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->

    <script>
        (function($){
            $(document).ready(()=>{
                $('.select-section').select2({
                    placeholder: "{{$placeholder}}" != "" ? "{{$placeholder}}" : "Please Select",
                    allowClear: true
                });
                $(document).change(function(event){ 
                    let
                        el = event.target,
                        sectionRow = $(el).closest('.section-row');

                    //new changes for multiselect with uuid and title besides id 
                    let selectEl = $(sectionRow).find('select');
                    var ids = $(selectEl).find("option:selected").map(function() {
                        return $(this).val();
                    }).get();


                    
                    var uuids = $(selectEl).find("option:selected").map(function() {
                        return $(this).data("uuid");
                    }).get();

                    var names = $(selectEl).find("option:selected").map(function() {
                        if($(this).val() != '') // to avoid placeholder
                        {
                            return $(this).text();
                        }else
                        {
                            return null;
                        }
                    }).get();


                    $(sectionRow).find('.{{$name}}-id-input').val(ids);
                    $(sectionRow).find('.{{$name}}-uuid-input').val(uuids);
                    $(sectionRow).find('.{{$name}}-title-input').val(names);
                });

                $.ajax({
                    url      : '{{$api}}',
                    method   : "GET",
                    dataType : "JSON",
                    crossDomain: true,
                    success     : function (res)
                    {

                        let options = '';
                        $.each(res.data,function(i,v){
                            options +=  `<option value="${v.id}" data-uuid="${v.uuid}">${v.title}</option>` 
                        });
                        let theSelect = $('*[data-triouuid="{{$uuid}}"]');

                        $(theSelect).html(options);
                        $(theSelect).prop('disabled', false);
                        $(theSelect).val(null);
                        $(theSelect).select2({
                            placeholder: "Please Select",
                            allowClear: true
                        })
                    },
                    error(err){
                        console.log(err);
                    }
                });
                
            });
        })(jQuery)

    </script>
@endpush