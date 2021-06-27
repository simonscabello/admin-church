@extends('home')

@section('content-body')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-user" style="margin-right: 4px"></i>Membro</h3>
                <div class="card-tools">
                    <a href="{{url()->previous()}}" class="btn btn-primary">Voltar</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row" style="margin-bottom: 2px">
                    <div class="col-lg-4">
                        <strong>Nome</strong>
                        <p class="text-muted">
                            {{$member->name}}
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <strong>Gênero</strong>
                        <p class="text-muted">
                            {{$member->gender->description}}
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <strong>Estado civil</strong>
                        <p class="text-muted">
                            {{$member->relationshipStatus->description}}
                        </p>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 2px">
                    <div class="col-lg-4">
                        <strong>CPF</strong>
                        <p class="text-muted">
                            {{$member->cpf}}
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <strong>RG</strong>
                        <p class="text-muted">
                            {{$member->rg}}
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <strong>Data de nascimento</strong>
                        <p class="text-muted">
                            {{date('d/m/Y', strtotime($member->birth_day))}}
                        </p>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 2px">
                    <div class="col-lg-4">
                        <strong>E-mail</strong>
                        <p class="text-muted">
                            {{$member->email ?? 'Não possui e-mail'}}
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <strong>Telefone</strong>
                        <p class="text-muted">
                            {{$member->phone}}
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <strong>Endereço</strong>
                        <p class="text-muted">
                            {{$member->address}}
                        </p>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 2px">
                    <div class="col-lg-4">
                        <strong>Data do batismo</strong>
                        <p class="text-muted">
                            {{date('d/m/Y', strtotime($member->baptism_day))}}
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <strong>Data da conversão</strong>
                        <p class="text-muted">
                            {{date('d/m/Y', strtotime($member->conversion_date))}}
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <strong>Nome do pai</strong>
                        <p class="text-muted">
                            {{$member->father_name}}
                        </p>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 2px">
                    <div class="col-lg-4">
                        <strong>Nome da mãe</strong>
                        <p class="text-muted">
                            {{$member->mother_name}}
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <strong>Natural de </strong>
                        <p class="text-muted">
                            {{$member->birth_place}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
