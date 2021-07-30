@extends('home')

@section('content-body')
    <div class="col-12">

        <div class="card card-primary">
            <div class="card-header">
                <h2 class="card-title">Editar evento</h2>
            </div>
            <form method="POST" action="{{route('events.update', $event->id)}}">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label for="name">Nome *</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required value="{{$event->name}}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <label for="description">Descrição *</label>
                            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" required value="{{$event->description}}">
                            @error('description')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <label for="start_date">Começa em *</label>
                            <input type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{$event->start_date}}">
                            @error('start_date')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label for="end_date">Termina em *</label>
                            <input type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{$event->end_date}}">
                            @error('end_date')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <label for="max_participants">Vagas *</label>
                            <input type="number" name="max_participants" class="form-control @error('max_participants') is-invalid @enderror" value="{{$event->max_participants}}">
                            @error('max_participants')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
