@extends('home')

@section('content-body')
    <div class="col-12">

        <div class="card card-primary">
            <div class="card-header">
                <h2 class="card-title">Novo departamento</h2>
            </div>
            <form method="POST" action="{{route('departments.store')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label for="member_id">Membro</label>
                            <select name="member_id" class="form-control" required>
                                <option disabled selected value> -- Selecione um membro -- </option>
                                <option value="">Líder não definido</option>
                                @foreach($members as $member)
                                    <option value="{{$member->id}}">{{$member->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="name">Nome *</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required value="{{old('name')}}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <label for="description">Descrição *</label>
                            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" required value="{{old('description')}}">
                            @error('description')
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
