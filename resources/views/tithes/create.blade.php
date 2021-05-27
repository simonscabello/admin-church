@extends('home')

@section('content-body')
<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Novo registro de contribuição</h2>
    </div>
    <form method="POST" action="{{route('tithes.store')}}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="member_id">Membro</label>
                <select name="member_id" class="form-control" required>
                    <option disabled selected value> -- Selecione um membro -- </option>
                    @foreach($members as $member)
                    <option value="{{$member->id}}">{{$member->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="type">Tipo</label>
                <select name="type" class="form-control" required>
                    <option disabled selected value> -- Selecione o tipo -- </option>
                    <option value="Dízimo">Dízimo</option>
                    <option value="Oferta">Oferta</option>
                </select>
            </div>

            <div class="form-group">
                <label for="value">Valor</label>
                <input type="number" name="value" class="form-control @error('value') is-invalid @enderror" value="{{old('value')}}">
                @error('value')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="date">Data</label>
                <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{old('date')}}">
                @error('date')
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
