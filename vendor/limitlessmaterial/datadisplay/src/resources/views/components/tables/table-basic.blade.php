<table {{ $attributes->merge(['class' => 'table table-striped table-condensed', 'id' => $id])  }}>
    {{ $slot }}
</table>