@extends('home')

@section('content-body')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Dízimos</h3>

            <div class="card-tools">
                <a href="{{route('tithes.create')}}" class="btn btn-primary">Novo registro</a>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table id="data-table" class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Membro</th>
                    <th>Data</th>
                    <th>Tipo</th>
                    <th>Valor</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tithes as $tithe)
                <tr>
                    <td>{{$tithe->id}}</td>
                    <td>{{$tithe->member->name ?? 'Membro excluido'}}</td>
                    <td>{{date('d/m/Y', strtotime($tithe->date))}}</td>
                    <td>{{$tithe->type}}</td>
                    <td>R$ {{$tithe->value}}</td>
                    <td>
                        <a href="{{route('tithes.edit', $tithe->id)}}" class="btn btn-warning"><i class="nav-icon fa fa-pencil-alt"></i></a>
                        <form id="delete-form{{$tithe->id}}" action="{{route('tithes.destroy', $tithe->id)}}" method="POST" class="d-none">
                            @csrf
                            @method('delete')
                        </form>
                        <button onclick="deletemember({{$tithe->id}});" class="btn btn-danger"><i class="nav-icon fa fa-trash"></i></button>
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
