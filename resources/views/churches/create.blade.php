@extends('home')

@section('content-body')
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h2 class="card-title">Nova igreja</h2>
            </div>
            <form method="POST" action="{{route('churches.store')}}">
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
                        <label for="description">Descrição</label>
                        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" required value="{{old('description')}}">
                        @error('description')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="address">Endereço</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" required value="{{old('address')}}">
                        @error('address')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="type">Tipo</label>
                        <select name="type" class="form-control" required>
                            <option disabled selected value> -- Selecione o tipo -- </option>
                            <option value="igreja">Igreja</option>
                            <option value="congregacao">Congregação</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="leader">Líder</label>
                        <input type="text" name="leader" class="form-control @error('leader') is-invalid @enderror" required value="{{old('leader')}}">
                        @error('leader')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="cnpj">CNPJ</label>
                        <input type="text" name="cnpj" class="form-control @error('cnpj') is-invalid @enderror" value="{{old('cnpj')}}">
                        @error('cnpj')
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
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
