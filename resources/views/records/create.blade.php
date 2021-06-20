@extends('home')

@section('content-body')
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h2 class="card-title">Nova ata</h2>
            </div>
            <form method="POST" action="{{route('records.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required value="{{old('name')}}" placeholder="Nome">
                        @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="date">Data da assembléia</label>
                        <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" required value="{{old('date')}}">
                        @error('date')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="file">Arquivo</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="file" required>
                                <label class="custom-file-label" for="file">Escolha um arquivo</label>
                                @error('file')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
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
