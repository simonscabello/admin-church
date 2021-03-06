@extends('home')

@section('content-body')
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h2 class="card-title">Novo membro</h2>
            </div>
        <form method="POST" action="{{route('members.store')}}">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-lg-4">
                        <label for="name">Nome completo *</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-lg-4">
                        <label for="gender_id">Sexo *</label>
                        <select name="gender_id" class="form-control @error('gender_id') is-invalid @enderror">
                            <option disabled selected value> -- Selecione um sexo -- </option>
                            @foreach($genders as $gender)
                                @if (old('gender_id') == $gender->id)
                                    <option value="{{ $gender->id}}" selected>{{ $gender->description }}</option>
                                @else
                                    <option value="{{$gender->id}}">{{$gender->description}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('gender_id')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-lg-4">
                        <label for="relationship_status_id">Estado civil *</label>
                        <select name="relationship_status_id" class="form-control @error('relationship_status_id') is-invalid @enderror">
                            <option disabled selected value> -- Selecione um estado civil -- </option>
                            @foreach($relationshipStatuses as $status)
                                @if (old('relationship_status_id') == $status->id)
                                    <option value="{{ $status->id}}" selected>{{ $status->description }}</option>
                                @else
                                    <option value="{{$status->id}}">{{$status->description}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('relationship_status_id')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-4">
                        <label for="cpf">CPF *</label>
                        <input type="text" id="cpf" name="cpf" class="form-control @error('cpf') is-invalid @enderror" value="{{old('cpf')}}">
                        @error('cpf')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-lg-4">
                        <label for="rg">RG *</label>
                        <input type="number" id="rg" name="rg" class="form-control @error('rg') is-invalid @enderror" value="{{old('rg')}}">
                        @error('rg')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-lg-4">
                        <label for="birth_day">Data de nascimento *</label>
                        <input type="date" class="form-control @error('birth_day') is-invalid @enderror" name="birth_day" value="{{old('birth_day')}}">
                        @error('birth_day')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-4">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-lg-4">
                        <label for="phone">Telefone *</label>
                        <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone')}}">
                        @error('phone')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-lg-4">
                        <label for="address">Endere??o *</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{old('address')}}">
                        @error('address')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-4">
                        <label for="cpf">Naturalidade *</label>
                        <input type="text" name="birth_place" class="form-control @error('birth_place') is-invalid @enderror" value="{{old('birth_place')}}">
                        @error('birth_place')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-lg-4">
                        <label for="conversion_date">Dia da convers??o *</label>
                        <input type="date" name="conversion_date" class="form-control @error('conversion_date') is-invalid @enderror" value="{{old('conversion_date')}}">
                        @error('conversion_date')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-lg-4">
                        <label for="baptism_day">Data do batismo *</label>
                        <input type="date" class="form-control @error('baptism_day') is-invalid @enderror" name="baptism_day" value="{{old('baptism_day')}}">
                        @error('baptism_day')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-6">
                        <label for="mother_name">Nome da m??e</label>
                        <input type="text" name="mother_name" class="form-control @error('mother_name') is-invalid @enderror" value="{{old('mother_name')}}">
                        @error('mother_name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <label for="father_name">Nome do pai</label>
                        <input type="text" name="father_name" class="form-control @error('father_name') is-invalid @enderror" value="{{old('father_name')}}">
                        @error('father_name')
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
