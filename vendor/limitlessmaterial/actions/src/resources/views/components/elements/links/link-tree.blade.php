@if ($outline)
    @php
    $classes = "btn 
                  btn-sm 
                  bg-success 
                  border-2 
                  border-success
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
                  btn-outline 
                  text-brown 
                  border-2 
                  border-brown 
                  btn-icon 
                  rounded-round 
                  legitRipple 
                  shadow 
                  mr-1";
   @endphp
@endif
<a {{ $attributes->class([$classes])->merge(["href" => "#","title"=> __("Themegeniematerial::link_action.Create", ['entity' => $entity]) ]) }} >
    <i class="fas fa-{{ $icon }}"></i>
   {{ $slot }}
</a>