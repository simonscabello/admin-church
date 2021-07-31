@extends('home')

@section('content-body')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pedidos de oração</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table id="data-table" class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Data</th>
                        <th>Descrição</th>
                        <th>Mensagem enviada</th>
                        <th>Enviar mensagem</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($requests as $request)
                        <tr>
                            <td>{{$request->id}}</td>
                            <td>{{$request->member->name}}</td>
                            <td>{{date('d/m/Y', strtotime($request->date))}}</td>
                            <td>{{$request->description}}</td>
                            <td>{{$request->response}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" onclick="modal({{$request->id}})">
                                    <i class="nav-icon fas fa-reply"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <form id="responder" method="post">
        @method('PUT')
        @csrf
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Enviar mensagem</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="text-align: center">
                        <textarea name="response" id="response" cols="50" rows="5"></textarea>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        function modal (pedido) {
            if (pedido) {
                $('#responder').attr('action', 'prayer-requests/' + pedido)
                $('.modal').modal('show');
            }
        }

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
    </script>
@endsection
