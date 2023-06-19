@props([
     "align" => "right"
])
<label class="form-check-label">
     if ($align == "left") {
             <input {{ $attributes->class(["form-check-input-styled"])->merge(["type"=>"radio"]) }}>
     }
    {{ $slot }}
     if ($align == "right") {
             <input {{ $attributes->class(["form-check-input-styled"])->merge(["type"=>"radio"]) }}>
     }
</label>