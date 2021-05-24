@extends('home')

@section('content-body')
<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Novo membro</h2>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="{{route('members.store')}}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="sexo">Sexo</label>
                <select name="sexo" class="form-control" required>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                </select>
            </div>

            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="data_de_nascimento">Data de nascimento</label>
                <input type="date" class="form-control" name="data_de_nascimento">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" class="form-control">
            </div>
            <div class="form-group">
                <label for="endereco">Email address</label>
                <input type="text" class="form-control" name="endereco">
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection
