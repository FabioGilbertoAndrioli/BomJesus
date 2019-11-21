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
    @if(isset($user))
        <form action="{{route('user.update',$user)}}" method="POST">
        {{ method_field('PUT') }}
    @else
        <form action="{{route('user.store')}}" method="POST">
    @endif
        @csrf
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputNome">Nome</label>
                <input type="text" value="{{$user->name ?? ''}}" name="name" class="form-control" id="inputNome" placeholder="Nome completo">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPerfil">Perfil</label>
            <select name="class" class="form-control" id="inputPerfil">
                @if(isset($user))
                    <option selected="selected">{{$user->profile}}</option>
                @else
                    <option  selected="selected">Perfil...</option>
                @endif
                <optgroup label="PERFIL">
                    <option value="Administrativo">Administrativo</option>
                    <option value="Pedagogico">Pedagógico</option>
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
