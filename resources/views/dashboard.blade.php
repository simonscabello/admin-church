@extends('home')

@section('content-body')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-bible"></i> Versículo</h5>
                            <p class="card-text">
                                "{{$data['random_verse']['text'] ?? ''}}"
                                {{$data['random_verse']['book']['name'] ?? ''}}
                                {{$data['random_verse']['chapter'] ?? ''}}:{{$data['random_verse']['number'] ?? ''}}
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-orange">
                        <div class="inner">
                            <h3>{{$data['members']->count()}}</h3>

                            <p>Total de membros</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="{{route('members.index')}}" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-gradient-info">
                        <div class="inner">
                            <h3>{{$data['visitors']->count()}}</h3>
                            <p>Visitantes</p>

                        </div>
                        <div class="icon">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <a href="{{route('visitors.index')}}" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3>{{$data['men']}}</h3>

                            <p>Total de homens</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-male"></i>
                        </div>
                        <a href="{{route('members.index')}}" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-pink">
                        <div class="inner">
                            <h3>{{$data['woman']}}</h3>

                            <p>Total de mulheres</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-female"></i>
                        </div>
                        <a href="{{route('members.index')}}" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>R$ {{$data['entries']}}</h3>

                            <p>Entradas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-comments-dollar"></i>
                        </div>
                        <a href="{{route('reports.index')}}" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>R$ {{$data['exits']}}</h3>

                            <p>Saídas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-comments-dollar"></i>
                        </div>
                        <a href="{{route('reports.index')}}" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-navy">
                        <div class="inner">
                            <h3>R$ {{$data['entries'] - $data['exits']}}</h3>

                            <p>Saldo em caixa</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-comments-dollar"></i>
                        </div>
                        <a href="{{route('reports.index')}}" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-gradient-indigo">
                        <div class="inner">
                            <h3>{{$data['member_tithe']}}</h3>

                            <p>Membros dizimístas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-comments-dollar"></i>
                        </div>
                        <a href="{{route('tithes.index')}}" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
