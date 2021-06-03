<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>inGlory</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
    @yield('content')
<script src="{{asset('js/app.js')}}"></script>
@include('sweetalert::alert')
</html>
