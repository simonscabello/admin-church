@extends('home')

@section('content-body')
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h2 class="card-title">Novo relatório</h2>
            </div>
            <form method="POST" action="{{route('reports.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nome *</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="Nome">
                        @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="month">Mês *</label>
                        <input type="month" name="month" class="form-control @error('month') is-invalid @enderror" value="{{old('month')}}">
                        @error('month')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="entries">Entradas *</label>
                        <input type="number" step="0.01" name="entries" class="form-control @error('entries') is-invalid @enderror"  value="{{old('entries')}}">
                        @error('entries')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exits">Saídas *</label>
                        <input type="number" step="0.01" name="exits" class="form-control @error('exits') is-invalid @enderror"  value="{{old('exits')}}">
                        @error('exits')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="file">Arquivo *</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input @error('file') is-invalid @enderror" id="file" >
                                <label class="custom-file-label " for="file">Escolha um arquivo</label>
                            </div>
                        </div>
                        @error('file')
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
