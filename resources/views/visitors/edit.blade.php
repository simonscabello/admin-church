@extends('home')

@section('content-body')
    <div class="col-12">

        <div class="card card-primary">
            <div class="card-header">
                <h2 class="card-title">Editar evento</h2>
            </div>
            <form method="POST" action="{{route('visitors.update', $visitor->id)}}">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required value="{{$visitor->name}}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="address">Descrição</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" required value="{{$visitor->address}}">
                        @error('address')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone">Telefone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$visitor->phone}}">
                        @error('phone')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="visit_day">Dia da visita</label>
                        <input type="date" class="form-control @error('visit_day') is-invalid @enderror" name="visit_day" value="{{$visitor->visit_day}}">
                        @error('visit_day')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
