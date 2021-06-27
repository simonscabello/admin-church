@extends('layouts.master')

@section('content')
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('dashboard')}}" class="nav-link">Home</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <button form="logout" type="submit" class="dropdown-item"><i class="fas fa-user mr-2"></i> Sair</button>
                    <form id="logout" action="{{route('logout')}}" method="post">
                        @csrf
                    </form>
                    <a class="dropdown-item" href="{{route('register')}}"><i class="fas fa-plus"></i>   Novo usuário</a>
                </div>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{route('dashboard')}}" class="brand-link" style="margin-left: 10px">
            <i class="fas fa-place-of-worship img-circle"></i>
            <span class="brand-text font-weight-light">SIB Barcelona</span>
        </a>

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="" class="d-block">Usuário: {{auth()->user()->name}}</a>
                </div>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{route('dashboard')}}" class="nav-link {{Route::is('dashboard') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
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
                        <a href="{{route('visitors.index')}}" class="nav-link {{Route::is('visitors.*') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-user-friends"></i>
                            <p>
                                Visitantes
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
                    <li class="nav-item">
                        <a href="{{route('records.index')}}" class="nav-link {{Route::is('records.*') ? 'active' : ''}}">
                            <i class="nav-icon far fa-clipboard"></i>
                            <p>
                                Atas
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('reports.index')}}" class="nav-link {{Route::is('reports.*') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-file-invoice-dollar"></i>
                            <p>
                                Relatórios financeiros
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
            Feito com amor :)
        </div>
        <strong>Copyright &copy; {{date('Y')}} <a href="https://github.com/simonscabello">Simon Scabello</a>.</strong> All rights reserved.
    </footer>
</div>
</body>
@endsection
