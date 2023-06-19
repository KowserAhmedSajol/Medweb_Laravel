@props([
     "align" => "right"
])
<label class="form-check-label">
    {{ $slot }}
     if ($align == "left") {
             <input {{ $attributes->class(["form-check-input-styled"])->merge(["type"=>"checkbox"]) }}>
     }
    {{ $slot }}
     if ($align == "right") {
             <input {{ $attributes->class(["form-check-input-styled"])->merge(["type"=>"checkbox"]) }}>
     }
</label>