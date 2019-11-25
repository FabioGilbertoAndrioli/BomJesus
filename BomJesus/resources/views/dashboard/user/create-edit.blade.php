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
        <form action="{{route('user.update',$user)}}" method="POST" enctype="multipart/form-data">
        {{ method_field('PUT') }}
    @else
        <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
    @endif
        @csrf
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputImage">Foto</label>
                <input type="file" name="image" class="form-control" id="inputImage">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputNome">Nome</label>
                <input type="text" value="{{$user->name ?? ''}}" name="name" class="form-control" id="inputNome" placeholder="Nome completo">
            </div>
        </div>
        <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail">Email</label>
                    <input type="email" value="{{$user->email ?? ''}}" name="email" class="form-control" id="inputEmail" placeholder="Endereço de email">
                </div>
            </div>
        <div class="form-group">
            <label for="inputPerfil">Perfil</label>
            <select name="profile" class="form-control" id="inputPerfil">
                @if(isset($user))
                    <option value=""  selected="selected">Perfil...</option>
                @endif
                <optgroup label="PERFIL">
                    <option @if(isset($user) && $user->profile == "Administrador") selected="selected" @endif  value="Administrador">Administrador</option>
                    <option @if(isset($user) && $user->profile == "Pedagogico") selected="selected" @endif value="Pedagogico">Pedagógico</option>
                </optgroup>
            </select>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputsexo">Sexo</label>
                <select name="sexo" class="form-control" id="inputSexo">
                        @if(isset($user))
                            <option value=""  selected="selected">Sexo...</option>
                        @endif
                        <optgroup label="Sexo">
                            <option  @if(isset($user) && $user->sexo == "Masculino") selected="selected" @endif value="Masculino">Masculino</option>
                            <option  @if(isset($user) && $user->sexo == "Feminino")  selected="selected" @endif value="Feminino">Feminino</option>
                        </optgroup>
                </select>
            </div>

            @if(isset($user))
                <div class="form-group col-md-8">
                    <label for="inputDate">Data de registro</label>
                    <input @if(isset($user)) value="{{Carbon\Carbon::parse($user->created_at)->format('Y-m-d') }}" @endif disabled type="date" class="form-control" id="inputDate">
                </div>
            @endif
        </div>
        <a class="btn btn-info" href="{{ url()->previous() }}">VOLTAR</a>
        <button type="submit" class="btn btn-primary">Enviar</button>
        @if(isset($user))
            <a href="{{route('user.confirm.delete',$user)}}" class="btn btn-danger">Deletar</a>
        @endif
    </form>
</div>
@endsection
