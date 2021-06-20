@extends('home')

@section('content-body')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Eventos cadastrados</h3>

                <div class="card-tools">
                    <a href="{{route('events.create')}}" class="btn btn-primary">Novo evento</a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table id="data-table" class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Começa em</th>
                        <th>Termina em</th>
                        <th>Vagas</th>
                        <th>Participantes</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td>{{$event->id}}</td>
                            <td>{{$event->name}}</td>
                            <td>{{$event->description}}</td>
                            <td>{{$event->start_date}}</td>
                            <td>{{$event->end_date}}</td>
                            <td>{{$event->max_participants}}</td>
                            <td>{{$event->registered_participants ?? '0'}}</td>
                            <td>
                                <a href="{{route('events.show', $event->id)}}" class="btn btn-primary"><i class="nav-icon fa fa-eye"></i></a>
                                <a href="{{route('events.edit', $event->id)}}" class="btn btn-warning"><i class="nav-icon fa fa-pencil-alt"></i></a>
                                <form id="delete-form{{$event->id}}" action="{{route('events.destroy', $event->id)}}" method="POST" class="d-none">
                                    @csrf
                                    @method('delete')
                                </form>
                                <button onclick="deleteevent({{$event->id}});" class="btn btn-danger"><i class="nav-icon fa fa-trash"></i></button>
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
                "order": [[ 0, "desc" ]],
                "language": {
                    "lengthMenu": "Mostrando _MENU_ registros por página",
                    "zeroRecords": "Nenhum registro encontrado",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
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

