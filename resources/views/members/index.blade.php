@extends('home')

@section('content-body')
<!--suppress JSCheckFunctionSignatures -->
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Membros cadastrados</h3>

            <div class="card-tools">
                <a href="{{route('members.create')}}" class="btn btn-primary">Novo membro</a>
            </div>
        </div>
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
                    <td>
                        <a href="{{route('members.show', $member->id)}}" class="btn btn-primary"><i class="nav-icon fa fa-eye"></i></a>
                        <a href="{{route('members.edit', $member->id)}}" class="btn btn-warning"><i class="nav-icon fa fa-pencil-alt"></i></a>
                        <form id="delete-form{{$member->id}}" action="{{route('members.destroy', $member->id)}}" method="POST" class="d-none">
                            @csrf
                            @method('delete')
                        </form>
                        <button form="delete-form{{$member->id}}" type="submit" onclick="deletemember({{$member->id}});" class="btn btn-danger"><i class="nav-icon fa fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function deletemember(id) {
        event.preventDefault();

        Swal.fire({
            title: 'Você tem certeza?',
            text: "Você nao poderá desfazer essa ação!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, deletar!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: 'members/' + id,
                    type: "DELETE",
                    success: function() {
                        window.location.reload();
                    },
                    error: function(e) {
                    }
                })
            }
        })
    }
</script>
@endsection
