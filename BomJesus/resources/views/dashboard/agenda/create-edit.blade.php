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
                <label for="inputNivel">* Usuário</label>
                <select name="user_id" class="form-control" id="inputNivel">
                    <option @if(!isset($reserve)) selected="selected" @endif >Usuário...</option>
                    <optgroup label="Usuários">
                       @forelse ($users as $user)
                            <option @if(isset($reserve) && $reserve->user == $user) selected="selected"  @endif value="{{$user->id}}">{{$user->name}}</option>
                       @empty
                        <option>Nenhum usuário encontrado...</option>
                       @endforelse
                    </optgroup>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="inputNivel">* Nível</label>
                <select name="level" class="form-control" id="inputNivel">
                    <option @if(!isset($reserve))  selected="selected" @endif>Nível...</option>
                    <optgroup label="NÍVEL">
                        <option @if(isset($reserve) && $reserve->level == "Infantil") selected="selected" @endif value="Infantil">Infantil</option>
                        <option @if(isset($reserve) && $reserve->level == "Fundamental") selected="selected" @endif value="Fundamental">Fundamental</option>
                        <option @if(isset($reserve) && $reserve->level == "Medio") selected="selected" @endif value="Medio">Médio</option>
                    </optgroup>
                </select>
            </div>
        </div>
        <div class="form-group">
            *
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
            <label for="inputTurma">* Turma</label>
            <select name="class" class="form-control" id="inputTurma">

                    <optgroup label="INFANTIL">
                        <option @if(isset($reserve) && $reserve->class == "Nivel A") selected="selected" @endif value="Nivel A">Nivel A</option>
                        <option @if(isset($reserve) && $reserve->class == "Nivel B") selected="selected" @endif value="Nivel B">Nivel B</option>
                        <option @if(isset($reserve) && $reserve->class == "Nivel C") selected="selected" @endif value="Nivel C">Nivel C</option>
                        <option @if(isset($reserve) && $reserve->class == "Nivel D") selected="selected" @endif value="Nivel D">Nivel D</option>
                    </optgroup>
                    <optgroup label="FUNDAMENTAL">
                        <option @if(isset($reserve) && $reserve->class == "1 ano I") selected="selected" @endif value="1 ano I">1.º ano I</option>
                        <option @if(isset($reserve) && $reserve->class == "1 ano II") selected="selected" @endif value="1 ano II">1.º ano II</option>
                        <option @if(isset($reserve) && $reserve->class == "2 ano I") selected="selected" @endif value="2 ano I">2.º ano I</option>
                        <option @if(isset($reserve) && $reserve->class == "2 ano II") selected="selected" @endif value="2 ano II">2.º ano II</option>
                        <option @if(isset($reserve) && $reserve->class == "3 ano I") selected="selected" @endif value="3 ano I">3.º ano I</option>
                        <option @if(isset($reserve) && $reserve->class == "3 ano II") selected="selected" @endif value="3 ano II">3.º ano II</option>
                        <option @if(isset($reserve) && $reserve->class == "4 ano I") selected="selected" @endif value="4 ano I">4.º ano I</option>
                        <option @if(isset($reserve) && $reserve->class == "4 ano II") selected="selected" @endif value="4 ano II">4.º ano II</option>
                        <option @if(isset($reserve) && $reserve->class == "5 ano I") selected="selected" @endif value="5 ano I">5.º ano I</option>
                        <option @if(isset($reserve) && $reserve->class == "5 ano II") selected="selected" @endif value="5 ano II">5.º ano II</option>
                        <option @if(isset($reserve) && $reserve->class == "6 ano I") selected="selected" @endif value="6 ano I">6.º ano I</option>
                        <option @if(isset($reserve) && $reserve->class == "6 ano II") selected="selected" @endif value="6 ano II">6.º ano II</option>
                        <option @if(isset($reserve) && $reserve->class == "7 ano I") selected="selected" @endif value="7 ano I">7.º ano I</option>
                        <option @if(isset($reserve) && $reserve->class == "7 ano II") selected="selected" @endif value="7 ano II">7.º ano II</option>
                        <option @if(isset($reserve) && $reserve->class == "8 ano I") selected="selected" @endif value="8 ano I">8.º ano I</option>
                        <option @if(isset($reserve) && $reserve->class == "8 ano II") selected="selected" @endif value="8 ano II">8.º ano II</option>
                        <option @if(isset($reserve) && $reserve->class == "9 ano I") selected="selected" @endif value="9 ano I">9.º ano I</option>
                        <option @if(isset($reserve) && $reserve->class == "9 ano II") selected="selected" @endif value="9 ano II">9.º ano II</option>
                    </optgroup>
                    <optgroup label="MÉDIO">
                        <option @if(isset($reserve) && $reserve->class == "1 serie I") selected="selected" @endif value="1 serie I">1.ª série I</option>
                        <option @if(isset($reserve) && $reserve->class == "1 serie II") selected="selected" @endif value="1 serie II">1.ª série II</option>
                        <option @if(isset($reserve) && $reserve->class == "2 serie I") selected="selected" @endif value="2 serie I">2.ª série I</option>
                        <option @if(isset($reserve) && $reserve->class == "2 serie II") selected="selected" @endif value="2 serie II">2.ª série II</option>
                        <option @if(isset($reserve) && $reserve->class == "3 serie I") selected="selected" @endif value="3 serie I">3.ª série I</option>
                        <option @if(isset($reserve) && $reserve->class == "3 serie II") selected="selected" @endif value="3 serie II">3.ª série II</option>
                    </optgroup>
            </select>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputNivel">* Perído</label>
                <select name="period" class="form-control" id="inputPeriodo">
                        <option  selected="selected">Período...</option>
                        <optgroup label="Período">
                            <option @if(isset($reserve) && $reserve->period == "Manha") selected="selected" @endif value="Manha">Manhã</option>
                            <option @if(isset($reserve) && $reserve->period == "Tarde") selected="selected" @endif value="Tarde">Tarde</option>
                            <option @if(isset($reserve) && $reserve->period == "Noite") selected="selected" @endif value="Noite">Noite</option>
                        </optgroup>
                </select>
            </div>
            <div class="form-group col-md-4">
            <label for="inputCarrinho">* Carrinho</label>
            <select name="car_id" id="inputCarrinho" class="form-control">
                <optgroup label="Carrinho">
                   @forelse ($cars as $car)
                    <option @if(isset($reserve) && $reserve->user == $user) selected="selected"  @endif value="{{$car->id}}">{{$car->name}}</option>
                   @empty
                        <option>Nenhum carrinho encontrado...</option>
                   @endforelse

                </optgroup>
            </select>
            </div>
            <div class="form-group col-md-4">
                <label for="inputDate">* Data</label>
                <input  @if(isset($reserve)) value="{{Carbon\Carbon::parse($reserve->date)->format('Y-m-d') }}" @endif name="date" type="date" class="form-control" id="inputDate">
            </div>
            @if(isset($reserve))
                <div class="form-group col-md-8">
                    <label for="inputDate">Data de registro</label>
                    <input @if(isset($reserve)) value="{{Carbon\Carbon::parse($reserve->created_at)->format('Y-m-d') }}" @endif disabled type="date" class="form-control" id="inputDate">
                </div>
            @endif
        </div>
        <a class="btn btn-info" href="{{ route('reserve.index') }}">VOLTAR</a>
        <button type="submit" class="btn btn-primary">Enviar</button>
        @if(isset($reserve))
            <a href="{{route('reserve.confirm.delete',$reserve)}}" class="btn btn-danger">Deletar</a>
        @endif
    </form>
</div>
@endsection
