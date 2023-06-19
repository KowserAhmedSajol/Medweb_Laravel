
<div class="btn-group {{$decoration['dropdownStyle']}}">
	<button {{$attributes->class(['btn ',$decoration['color'], $label['dropdownIcon']])->merge(['type' => 'button', 'data-toggle'=> "dropdown"])}}>
@if($icon['align']==='left')        
   <b><i class="{{$icon['key']}}"></i></b>
@endif  
@if($label['text'])        
    {{$label['text']}}
@endif    
@if($icon['align']==='right')        
   <b><i class="{{$icon['key']}}"></i></b>
@endif        
    </button>
    
@if($decoration['segmented'])
    <button type="button" {{$attributes->class(['btn dropdown-toggle', $decoration['color']])}} data-toggle="dropdown"></button>
@endif  
@if($label['dropdown'])
		<div class="dropdown-menu dropdown-menu-{{$label['menuAlign']}}">
			@if (is_array($dropdownData))

				@foreach ($dropdownData as $item)
					<a href="#" class="dropdown-item"><i class="{{$item['icon']}}"></i> {{$item['text']}}</a>
					@if($item['divider'])
					<div class="dropdown-divider"></div>
					@endif
				@endforeach

			@endif
	    </div>
		<!-- <div class="dropdown-menu dropdown-menu-right">

			<a href="#" class="dropdown-item"><i class="icon-menu7"></i> Action</a>
			<a href="#" class="dropdown-itm"><i class="icon-screen-full"></i> Another action</a>
			<a href="#" class="dropdown-item"><i class="icon-mail5"></i> One more action</a>
			<div class="dropdown-divider"></div>
			<a href="#" class="dropdown-item"><i class="icon-gear"></i> Separated line</a>
	    </div> -->
 @endif       
</div>

<!-- 
    *******Radio button group*********
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn btn-primary active">
										<input type="radio" name="options" id="option1" autocomplete="off" checked>
										Option 1
									</label>

									<label class="btn btn-primary">
										<input type="radio" name="options" id="option2" autocomplete="off">
										Option 2
									</label>

									<label class="btn btn-primary">
										<input type="radio" name="options" id="option3" autocomplete="off">
										Option 3
									</label>
	</div>
*******Justified link group*********
                                  <div class="btn-group btn-group-justified">
									<a href="#" class="btn bg-slate-700">Left</a>
									<a href="#" class="btn bg-slate-700">Middle</a>
									<a href="#" class="btn bg-slate-700">Right</a>
								</div>
*******Button group*********
                                <div class="btn-group">
									<button type="button" class="btn btn-primary">Left</button>
									<button type="button" class="btn btn-primary">Middle</button>
									<button type="button" class="btn btn-primary">Right</button>
								</div>
                            
-->

