@extends('home')

@section('content-body')
    <div class="col-12">

        <div class="card card-primary">
            <div class="card-header">
                <h2 class="card-title">Novo registro de contribuição</h2>
            </div>
            <form method="POST" action="{{route('tithes.update', $tithe->id)}}">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label for="member_id">Membro *</label>
                            <select name="member_id" class="form-control" required>
                                <option selected value="{{$tithe->member->id}}"> {{$tithe->member->name}} </option>
                                <option disabled> --- </option>
                                @foreach($members as $member)
                                    <option value="{{$member->id}}">{{$member->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="type">Tipo *</label>
                            <select name="type" class="form-control" required>
                                <option selected value="{{$tithe->type}}"> {{$tithe->type   }} </option>
                                <option disabled> --- </option>
                                <option value="Dízimo">Dízimo</option>
                                <option value="Oferta">Oferta</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="value">Valor *</label>
                            <input type="number" name="value" class="form-control @error('value') is-invalid @enderror" value="{{$tithe->value}}">
                            @error('value')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label for="date">Data *</label>
                            <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{$tithe->date}}">
                            @error('date')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
