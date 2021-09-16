@extends('home')

@section('content-body')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Departamentos</h3>

            <div class="card-tools">
                <a href="{{route('departments.create')}}" class="btn btn-primary">Novo departamento</a>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table id="data-table" class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Responsável</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($departments as $department)
                <tr>
                    <td>{{$department->id}}</td>
                    <td>{{$department->name}}</td>
                    <td>{{$department->member->name ?? 'Líder não definido'}}</td>
                    <td>{{$department->description}}</td>
                    <td>
                        <a href="{{route('departments.show', $department->id)}}" class="btn btn-primary"><i class="nav-icon fa fa-eye"></i></a>
                        <a href="{{route('departments.edit', $department->id)}}" class="btn btn-warning"><i class="nav-icon fa fa-pencil-alt"></i></a>
                        <form id="delete-form{{$department->id}}" action="{{route('departments.destroy', $department->id)}}" method="POST" class="d-none">
                            @csrf
                            @method('delete')
                        </form>
                        <button onclick="deletemember({{$department->id}});" class="btn btn-danger"><i class="nav-icon fa fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#data-table").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "order": [[ 1, "asc" ]],
            "language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nenhum registro encontrado",
                "info": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "infoEmpty": "No records available",
            }
        })
    });

    function deletemember(id) {
        event.preventDefault();

        Swal.fire({
            title: 'Você tem certeza?',
            text: "Você não poderá desfazer essa ação!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0d82ee',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, deletar!'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#delete-form' + id).submit()
            }
        })
    }

</script>
@endsection
