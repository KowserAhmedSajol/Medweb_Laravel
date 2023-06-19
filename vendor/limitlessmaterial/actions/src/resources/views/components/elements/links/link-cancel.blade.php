@if ($outline)
    @php
       $classes = "btn 
                  btn-sm 
                  btn-outline 
                  text-danger 
                  border-2 
                  border-danger 
                  btn-icon 
                  rounded-round 
                  legitRipple 
                  shadow 
                  mr-1";
   @endphp
@else
    @php
      $classes = "btn 
                  btn-sm 
                  bg-danger 
                  border-2 
                  border-danger
                  btn-icon 
                  rounded-round 
                  legitRipple 
                  shadow 
                  mr-1";
   @endphp
@endif
<a {{ $attributes->class([$classes])->merge(["href" => "#","title"=> __("Themegeniematerial::link_action.Cancel", ['entity' => $entity]) ]) }} >
   <i class="icon-cross"></i>
   {{ $slot }}
</a>
