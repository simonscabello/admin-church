@extends('home')

@section('content-body')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Funcionários cadastrados</h3>

                <div class="card-tools">
                    <a href="{{route('employees.create')}}" class="btn btn-primary">Novo funcionário</a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table id="data-table" class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>CPF</th>
                        <th>Cargo</th>
                        <th>Descrição</th>
                        <th>Telephone</th>
                        <th>E-mail</th>
                        <th>Começou em</th>
                        <th>Salário</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{$employee->id}}</td>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->address}}</td>
                            <td>{{$employee->cpf}}</td>
                            <td>{{$employee->occupation}}</td>
                            <td>{{$employee->description}}</td>
                            <td>{{$employee->phone}}</td>
                            <td>{{$employee->email}}</td>
                            <td>{{date('d/m/Y', strtotime($employee->started_in))}}</td>
                            <td>R$ {{$employee->salary}}</td>

                            <td>
                                <a href="{{route('employees.show', $employee->id)}}" class="btn btn-primary"><i class="nav-icon fa fa-eye"></i></a>
                                <a href="{{route('employees.edit', $employee->id)}}" class="btn btn-warning"><i class="nav-icon fa fa-pencil-alt"></i></a>
                                <form id="delete-form{{$employee->id}}" action="{{route('employees.destroy', $employee->id)}}" method="POST" class="d-none">
                                    @csrf
                                    @method('delete')
                                </form>
                                <button onclick="deleteemployee({{$employee->id}});" class="btn btn-danger"><i class="nav-icon fa fa-trash"></i></button>
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

