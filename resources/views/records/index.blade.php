@extends('home')

@section('content-body')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Atas</h3>

            <div class="card-tools">
                <a href="{{route('records.create')}}" class="btn btn-primary">Nova ata</a>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table id="data-table" class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data da assembléia</th>
                    <th>Arquivo</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($records as $record)
                <tr>
                    <td>{{$record->id}}</td>
                    <td>{{$record->name}}</td>
                    <td>{{date('d/m/Y', strtotime($record->date))}}</td>
                    <td><a target="_blank" href="{{$record->file->url}}"><i class="fas fa-file-pdf"></i> {{$record->file->original_name}}</a></td>
                    <td>
                        <a href="{{route('records.show', $record->id)}}" class="btn btn-primary"><i class="nav-icon fa fa-eye"></i></a>
                        <form id="delete-form{{$record->id}}" action="{{route('records.destroy', $record->id)}}" method="POST" class="d-none">
                            @csrf
                            @method('delete')
                        </form>
                        <button onclick="deletemember({{$record->id}});" class="btn btn-danger"><i class="nav-icon fa fa-trash"></i></button>
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
            "order": [[ 2, "asc" ]],
            "language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nenhum registro encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
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
