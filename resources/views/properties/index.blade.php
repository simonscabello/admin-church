@extends('home')

@section('content-body')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Patrimônio</h3>

            <div class="card-tools">
                <a href="{{route('properties.create')}}" class="btn btn-primary">Novo item</a>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Quantidade</th>
                    <th>Valor</th>
                    <th>Data de aquisição</th>
                    <th>Doado</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($properties as $propertie)
                <tr>
                    <td>{{$propertie->id}}</td>
                    <td>{{$propertie->name}}</td>
                    <td>{{$propertie->description}}</td>
                    <td>{{$propertie->amount}}</td>
                    <td>{{$propertie->value}}</td>
                    <td>{{date('d/m/Y', strtotime($propertie->buy_date))}}</td>
                    <td>{{$propertie->donated}}</td>
                    <td>
                        <a href="{{route('properties.show', $propertie->id)}}" class="btn btn-primary"><i class="nav-icon fa fa-eye"></i></a>
                        <a href="{{route('properties.edit', $propertie->id)}}" class="btn btn-warning"><i class="nav-icon fa fa-pencil-alt"></i></a>
                        <form id="delete-form{{$propertie->id}}" action="{{route('properties.destroy', $propertie->id)}}" method="POST" class="d-none">
                            @csrf
                            @method('delete')
                        </form>
                        <button onclick="deletemember({{$propertie->id}});" class="btn btn-danger"><i class="nav-icon fa fa-trash"></i></button>
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
                $('#delete-form' + id).submit()
            }
        })
    }
</script>
@endsection
