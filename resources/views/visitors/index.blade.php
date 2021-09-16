@extends('home')

@section('content-body')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Visitantes</h3>

                <div class="card-tools">
                    <a href="{{route('visitors.create')}}" class="btn btn-primary">Novo visitante</a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table id="data-table" class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>Telefone</th>
                        <th>Dia da visita</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($visitors as $visitor)
                        <tr>
                            <td>{{$visitor->id}}</td>
                            <td>{{$visitor->name}}</td>
                            <td>{{$visitor->address}}</td>
                            <td>{{$visitor->phone}}</td>
                            <td>{{date('d/m/Y', strtotime($visitor->visit_day))}}</td>
                            <td>
                                <a href="{{route('visitors.show', $visitor->id)}}" class="btn btn-primary"><i class="nav-icon fa fa-eye"></i></a>
                                <a href="{{route('visitors.edit', $visitor->id)}}" class="btn btn-warning"><i class="nav-icon fa fa-pencil-alt"></i></a>
                                <form id="delete-form{{$visitor->id}}" action="{{route('visitors.destroy', $visitor->id)}}" method="POST" class="d-none">
                                    @csrf
                                    @method('delete')
                                </form>
                                <button onclick="deleteevent({{$visitor->id}});" class="btn btn-danger"><i class="nav-icon fa fa-trash"></i></button>
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
                "order": [[ 4, "asc" ]],
                "language": {
                    "lengthMenu": "Mostrando _MENU_ registros por página",
                    "zeroRecords": "Nenhum registro encontrado",
                    "info": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "infoEmpty": "No records available",
                }
            })
        });

        function deleteevent(id) {
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
                    $('#delete-form' + id).submit()
                }
            })
        }
    </script>
@endsection

