@extends('home')

@section('content-body')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Membros cadastrados</h3>

            <div class="card-tools">
                <a href="{{route('members.create')}}" class="btn btn-primary">Novo membro</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Sexo</th>
                    <th>CPF</th>
                    <th>E-mail</th>
                    <th>Data de nascimento</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($members as $member)
                <tr>
                    <td>{{$member->id}}</td>
                    <td>{{$member->name}}</td>
                    <td>{{$member->gender}}</td>
                    <td>{{$member->cpf}}</td>
                    <td>{{$member->email}}</td>
                    <td>{{$member->age}}</td>
                    <td>{{$member->phone}}</td>
                    <td>{{$member->address}}</td>
                    <td>Ações</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection
