@extends('home')

@section('content-body')
    <div class="col-12">

        <div class="card card-primary">
            <div class="card-header">
                <h2 class="card-title">Novo funcionário</h2>
            </div>
            <form method="POST" action="{{route('employees.store')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
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
                            <label for="address">Endereço *</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" required value="{{old('address')}}">
                            @error('address')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <label for="cpf">CPF *</label>
                            <input type="text" name="cpf" id="cpf" class="form-control @error('cpf') is-invalid @enderror" required value="{{old('cpf')}}">
                            @error('cpf')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label for="occupation">Cargo *</label>
                            <input type="text" name="occupation" class="form-control @error('occupation') is-invalid @enderror" required value="{{old('occupation')}}">
                            @error('occupation')
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
                        <div class="col-lg-4">
                            <label for="phone">Telefone *</label>
                            <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" required value="{{old('phone')}}">
                            @error('phone')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label for="started_in">Começou em *</label>
                            <input type="date" class="form-control @error('started_in') is-invalid @enderror" name="started_in" value="{{old('started_in')}}">
                            @error('started_in')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <label for="salary">Salário *</label>
                            <input required type="number" id="money" step="0.01" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{old('salary')}}">
                            @error('salary')
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

@section('script')
    <script>
        $(document).ready(function (){
            $('#cpf').inputmask({mask: ['999.999.999-99'], keepStatic: true, removeMaskOnSubmit: true})
            $('#phone').inputmask({mask: ['(99) 99999-9999'], keepStatic: true, removeMaskOnSubmit: false})
        });
    </script>
@endsection
