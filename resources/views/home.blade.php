@extends('layouts.master')

@section('content')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Home</a>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="#" class="brand-link" style="margin-left: 10px">
            <i class="fas fa-place-of-worship img-circle"></i>
            <span class="brand-text font-weight-light">SIB Barcelona</span>
        </a>

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="https://scontent.fvix3-1.fna.fbcdn.net/v/t1.6435-1/cp0/p40x40/120948122_3434979316578462_5650602700484922946_n.jpg?_nc_cat=111&ccb=1-3&_nc_sid=dbb9e7&_nc_eui2=AeGTANYyIumOzl61Dg9BpmerFloUmrdJLycWWhSat0kvJ0xMqXYFldbm1NfexTKEXbQQKpLfKMGBUtgHCyNB0QK2&_nc_ohc=rcvrpCyD6VsAX94a0om&_nc_ht=scontent.fvix3-1.fna&tp=27&oh=31acd5dbe76daaca522f8f6cc4e0efac&oe=60D1BFAB" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="d-block">{{auth()->user()->name ?? '-'}}</a>
                </div>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{route('churches.index')}}" class="nav-link {{Route::is('churches.*') ? 'active' : ''}}">
                            <i class="nav-icon fa fa-cross"></i>
                            <p>
                                Igreja e congregações
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('members.index')}}" class="nav-link {{Route::is('members.*') ? 'active' : ''}}">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Membros
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('events.index')}}" class="nav-link {{Route::is('events.*') ? 'active' : ''}}">
                            <i class="nav-icon fa fa-calendar-alt"></i>
                            <p>
                                Eventos
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('employees.index')}}" class="nav-link {{Route::is('employees.*') ? 'active' : ''}}">
                            <i class="nav-icon fa fa-id-badge"></i>
                            <p>
                                Funcionários
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('properties.index')}}" class="nav-link {{Route::is('properties.*') ? 'active' : ''}}">
                            <i class="nav-icon fa fa-building"></i>
                            <p>
                                Patrimônio
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('tithes.index')}}" class="nav-link {{Route::is('tithes.*') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-money-check-alt"></i>
                            <p>
                                Dízimos
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('departments.index')}}" class="nav-link {{Route::is('departments.*') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-chalkboard-teacher"></i>
                            <p>
                                Cargos e Departamentos
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper" style="margin-top: 15px;">
        @yield('content-body')
    </div>

    <footer class="main-footer">
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
        <strong>Copyright &copy; {{date('Y')}} <a href="https://github.com/simonscabello">Simon Scabello</a>.</strong> All rights reserved.
    </footer>
</div>
</body>
@endsection
