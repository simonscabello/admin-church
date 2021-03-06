<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Igreja ON | Administrativo</title>

    <link rel="sortcut icon" href="https://img.icons8.com/plasticine/2x/church.png" type="image/x-icon" />

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.25/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/b-print-1.7.1/r-2.2.9/datatables.min.css"/>

    <script src="{{asset('js/app.js')}}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://rawgit.com/RobinHerbots/Inputmask/4.x/dist/jquery.inputmask.bundle.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.25/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/b-print-1.7.1/r-2.2.9/datatables.min.js"></script>
    @yield('script')
</head>
    @yield('content')
@include('sweetalert::alert')
</html>
