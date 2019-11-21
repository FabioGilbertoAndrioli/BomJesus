@extends('dashboard.template.template')

@section('content')
@if(isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error )
            <p>{{$error}}</p>
        @endforeach
    </div>
    <hr>
@endif
<div class="panel-form">
    @if(isset($reserve))
        <form action="{{route('reserve.update',$reserve)}}" method="POST">
        {{ method_field('PUT') }}
    @else
        <form action="{{route('reserve.store')}}" method="POST">
    @endif
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputNome">Nome</label>
                <input type="text" value="{{$reserve->name ?? ''}}" name="name" class="form-control" id="inputNome" placeholder="Name">
            </div>
            <div class="form-group col-md-6">
                <label for="inputNivel">Nível</label>
                <select name="level" class="form-control" id="inputNivel">
                    @if(isset($reserve))
                        <option selected="selected">{{$reserve->level}}</option>
                    @else
                    <option  selected="selected">Nível...</option>
                    @endif
                        <optgroup label="NÍVEL">
                            <option value="Infantil">Infantil</option>
                            <option value="Fundamental">Fundamental</option>
                            <option value="Médio">Médio</option>
                        </optgroup>
                </select>
            </div>
        </div>
        <div class="form-group">
                <div class="form-check form-check-inline">
                    <input name="classes[]" @if(isset($reserve)) {{ in_array("Primeira aula",$reserve->classes) ? 'checked' : '' }} @endif class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Primeira aula">
                    <label class="form-check-label" for="inlineCheckbox1">Primeira aula</label>
                </div>
                <div class="form-check form-check-inline">
                    <input name="classes[]" @if(isset($reserve)) {{ in_array("Segunda aula",$reserve->classes) ? 'checked' : '' }} @endif class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Segunda aula">
                    <label class="form-check-label" for="inlineCheckbox2">Segunda aula</label>
                </div>
                <div class="form-check form-check-inline">
                    <input name="classes[]" @if(isset($reserve)) {{ in_array("Terceira aula",$reserve->classes) ? 'checked' : '' }} @endif class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Terceira aula">
                    <label class="form-check-label" for="inlineCheckbox3">Terceira aula</label>
                </div>
                <div class="form-check form-check-inline">
                    <input name="classes[]" @if(isset($reserve)) {{ in_array("Quarta aula",$reserve->classes) ? 'checked' : '' }} @endif class="form-check-input" type="checkbox" id="inlineCheckbox4" value="Quarta aula">
                    <label class="form-check-label" for="inlineCheckbox4">Quarta aula</label>
                </div>
                <div class="form-check form-check-inline">
                    <input name="classes[]" @if(isset($reserve)) {{ in_array("Quinta aula",$reserve->classes) ? 'checked' : '' }} @endif class="form-check-input" type="checkbox" id="inlineCheckbox5" value="Quinta aula">
                    <label class="form-check-label" for="inlineCheckbox5">Quinta aula</label>
                </div>
            </div>
        <div class="form-group">
            <label for="inputTurma">Turma</label>
            <select name="class" class="form-control" id="inputTurma">
                    @if(isset($reserve))
                        <option selected="selected">{{$reserve->class}}</option>
                    @else
                        <option  selected="selected">Nível...</option>
                    @endif
                    <optgroup label="INFANTIL">
                        <option value="1 ano I">Nivel A</option>
                        <option value="1 ano I">Nivel B</option>
                        <option value="1 ano I">Nivel C</option>
                        <option value="1 ano I">Nivel D</option>
                    </optgroup>
                    <optgroup label="FUNDAMENTAL">
                        @if(isset($reserve))
                            <option selected="selected">{{$reserve->class}}</option>
                        @else
                            <option  selected="selected">Turma...</option>
                        @endif
                        <option value="1 ano I">1.º ano I</option>
                        <option value="1 ano II">1.º ano II</option>
                        <option value="2 ano I">2.º ano I</option>
                        <option value="2 ano II">2.º ano II</option>
                        <option value="3 ano I">3.º ano I</option>
                        <option value="3 ano II">3.º ano II</option>
                        <option value="4 ano I">4.º ano I</option>
                        <option value="4 ano II">4.º ano II</option>
                        <option value="5 ano I">5.º ano I</option>
                        <option value="5 ano II">5.º ano II</option>
                        <option value="6 ano I">6.º ano I</option>
                        <option value="6 ano II">6.º ano II</option>
                        <option value="7 ano I">7.º ano I</option>
                        <option value="7 ano II">7.º ano II</option>
                        <option value="8 ano I">8.º ano I</option>
                        <option value="8 ano II">8.º ano II</option>
                        <option value="9 ano I">9.º ano I</option>
                        <option value="9 ano II">9.º ano II</option>
                    </optgroup>
                    <optgroup label="MÉDIO">
                        <option value="1 serie I">1.ª série I</option>
                        <option value="1 serie II">1.ª série II</option>
                        <option value="2 serie I">2.ª série I</option>
                        <option value="2 serie II">2.ª série II</option>
                        <option value="3 serie I">3.ª série I</option>
                        <option value="3 serie II">3.ª série II</option>
                    </optgroup>
            </select>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputNivel">Perído</label>
                <select name="period" class="form-control" id="inputPeriodo">
                        @if(isset($reserve))
                            <option selected="selected">{{$reserve->period}}</option>
                        @else
                            <option  selected="selected">Período...</option>
                        @endif
                        <optgroup label="Período">
                            <option value="Manha">Manhã</option>
                            <option value="Tarde">Tarde</option>
                            <option value="Noite">Noite</option>
                        </optgroup>
                </select>
            </div>
            <div class="form-group col-md-4">
            <label for="inputCarrinho">Carrinho</label>
            <select name="car_id" id="inputCarrinho" class="form-control">
                @if(isset($reserve))
                    <option selected="selected">{{$reserve->class}}</option>
                @else
                    <option  selected="selected">Carrinho...</option>
                @endif
                <optgroup label="Carrinho">
                    <option value="Manha">Carrinho 1</option>
                    <option value="Tarde">Carrinho 2</option>
                </optgroup>
            </select>
            </div>
            <div class="form-group col-md-4">
                <label for="inputDate">Data</label>
                <input  @if(isset($reserve)) value="{{Carbon\Carbon::parse($reserve->date)->format('Y-m-d') }}" @endif name="date" type="date" class="form-control" id="inputDate">
            </div>
            @if(isset($reserve))
                <div class="form-group col-md-8">
                    <label for="inputDate">Data de registro</label>
                    <input @if(isset($reserve)) value="{{Carbon\Carbon::parse($reserve->created_at)->format('Y-m-d') }}" @endif disabled type="date" class="form-control" id="inputDate">
                </div>
            @endif
        </div>
        <a class="btn btn-info" href="{{ url()->previous() }}">VOLTAR</a>
        <button type="submit" class="btn btn-primary">Enviar</button>
        @if(isset($reserve))
            <a href="{{route('reserve.confirm.delete',$reserve)}}" class="btn btn-danger">Deletar</a>
        @endif
    </form>
</div>
@endsection
