<!DOCTYPE html>
<html lang='{{ str_replace('_', '-', app()->getLocale()) }}'>
<head>
    <x-sg-titlebar title="{{__('Login')}}"/>
    <x-sg-meta />
    <x-sg-style />
</head>

<body>

    <!-- Page content -->
    {{$slot}}
    <x-sg-js />
    
</body>
</html>
