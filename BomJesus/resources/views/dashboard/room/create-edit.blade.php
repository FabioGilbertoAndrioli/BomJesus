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
    @if(isset($room))
        <form action="{{route('room.update',$room)}}" method="POST" >
        {{ method_field('PUT') }}
    @else
        <form action="{{route('room.store')}}" method="POST" >
    @endif
        @csrf
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputNome">Nome da sala</label>
                <input type="text" value="{{$room->name ?? ''}}" name="name" class="form-control" id="inputNome" placeholder="Nome da sala">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputNivel">Nível</label>
                <select name="level" class="form-control" id="inputNivel">
                    <option @if(!isset($room))  selected="selected" @endif>Nível...</option>
                    <optgroup label="NÍVEL">
                        <option @if(isset($room) && $room->level == "Infantil") selected="selected" @endif value="Infantil">Infantil</option>
                        <option @if(isset($room) && $room->level == "Fundamental") selected="selected" @endif value="Fundamental">Fundamental</option>
                        <option @if(isset($room) && $room->level == "Medio") selected="selected" @endif value="Medio">Médio</option>
                    </optgroup>
                </select>
            </div>
        </div>
        <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputNivel">Tipo</label>
                    <select name="type" class="form-control" id="inputNivel">
                        <option @if(!isset($room))  selected="selected" @endif>Tipo...</option>
                        <optgroup label="Tipo">
                            <option @if(isset($room) && $room->type == "Pedagogico") selected="selected" @endif value="Pedagogico">Pedagógico</option>
                            <option @if(isset($room) && $room->type == "Administrativo") selected="selected" @endif value="Administrativo">Administrativo</option>
                        </optgroup>
                    </select>
                </div>
            </div>

            @if(isset($room))
                <div class="form-group col-md-8">
                    <label for="inputDate">Data de registro</label>
                    <input @if(isset($room)) value="{{Carbon\Carbon::parse($room->created_at)->format('Y-m-d') }}" @endif disabled type="date" class="form-control" id="inputDate">
                </div>
            @endif
        </div>
        <a class="btn btn-info" href="{{ route('room.index') }}">VOLTAR</a>
        <button type="submit" class="btn btn-primary">Enviar</button>
        @if(isset($room))
            <a href="{{route('room.confirm.delete',$room)}}" class="btn btn-danger">Deletar</a>
        @endif
    </form>
</div>
@endsection
