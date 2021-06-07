@extends('home')

@section('content-body')
    <div class="card card-primary">
        <div class="card-header">
            <h2 class="card-title">Editar item</h2>
        </div>
        <form method="POST" action="{{route('properties.update', $propertie->id)}}">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required value="{{$propertie->name}}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Descrição</label>
                    <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" required value="{{$propertie->description}}">
                    @error('description')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="amount">Quantidade</label>
                    <input type="number" name="amount" class="form-control @error('amount') is-invalid @enderror" value="{{$propertie->amount}}">
                    @error('amount')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="value">Valor</label>
                    <input type="number" class="form-control @error('value') is-invalid @enderror" name="value" value="{{$propertie->value}}">
                    @error('value')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="buy_date">Data de aquisição</label>
                    <input type="date" name="buy_date" class="form-control @error('buy_date') is-invalid @enderror" value="{{$propertie->buy_date}}">
                    @error('buy_date')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="donated">Doado</label>
                    <div class="form-check">
                        <input class="form-check-input" value="Sim" type="radio" name="donated" @if($propertie->donated == 'Sim') checked @endif>
                        <label class="form-check-label">Sim</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="Não" type="radio" name="donated" @if($propertie->donated == 'Não') checked @endif>
                        <label class="form-check-label">Não</label>
                    </div>
                    @error('donated')
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
@endsection