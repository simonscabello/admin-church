@extends('home')

@section('content-body')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Relatórios financeiros</h3>

                <div class="card-tools">
                    <a href="{{route('reports.create')}}" class="btn btn-primary">Novo relatório</a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table id="data-table" class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Mês</th>
                        <th>Arquivo</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reports as $report)
                        <tr>
                            <td>{{$report->id}}</td>
                            <td>{{$report->name}}</td>
                            <td>{{date('m/Y', strtotime($report->month))}}</td>
                            <td><a target="_blank" href="{{$report->file->url}}"><i class="fas fa-file-pdf"></i> {{$report->file->original_name}}</a></td>

                            <td>
                                <a href="{{route('employees.show', $report->id)}}" class="btn btn-primary"><i class="nav-icon fa fa-eye"></i></a>
                                <form id="delete-form{{$report->id}}" action="{{route('reports.destroy', $report->id)}}" method="POST" class="d-none">
                                    @csrf
                                    @method('delete')
                                </form>
                                <button onclick="deleteemployee({{$report->id}});" class="btn btn-danger"><i class="nav-icon fa fa-trash"></i></button>
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
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No records available",
                }
            })
        });

        function deleteemployee(id) {
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
