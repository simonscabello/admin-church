@extends('home')

@section('content-body')
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h2 class="card-title">Novo membro</h2>
            </div>
        <form method="POST" action="{{route('members.store')}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required value="{{old('name')}}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="gender">Sexo</label>
                    <select name="gender" class="form-control" required>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" class="form-control @error('cpf') is-invalid @enderror" required value="{{old('cpf')}}">
                    @error('cpf')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="age">Data de nascimento</label>
                    <input type="date" class="form-control @error('age') is-invalid @enderror" name="age" value="{{old('age')}}">
                    @error('age')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Telefone</label>
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone')}}">
                    @error('phone')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Endereço</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{old('address')}}">
                    @error('address')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
        </div>
    </div>
@endsection
