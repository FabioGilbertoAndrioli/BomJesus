@extends('dashboard.template.template')

@section('content')
@if(Session::has('success'))
 		<div class="alert alert-success hide-msg" style="float: left; width: 100%; margin: 10px 0px">
 			{{Session::get('success')}}
 		</div>
    <hr>
@endif
<div class="header-reserve">
    <div class="register">
        <a href="{{route('user.create')}}" class="btn btn-info"><i class="fa fa-user"></i> CADASTRAR</a>
    </div> <!-- register -->
    <div class="search">
        <form>
            <input type="text" name="search" />
            <button type="submit">Buscar <i class="fa fa-search"></i></button>
        </form>
    </div><!-- search -->
</div> <!-- header-reserve -->
    <div class="my-panel-user">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">Foto</th>
                <th scope="col">Nome</th>
                <th scope="col">Perfil</th>
                <th scope="col">Registro</th>
                <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td><img class="img-profile" width="30px" height="40px" src="{{ asset('/resource/img/profile/fabio.jpg') }}"></td>
                        <td class="list-user-name"><i style="color:rgb(0, 60, 88)" class="fa fa-user"></i> Fábio Gilberto A. Gonçcalves</td>
                        <td> {{$user->profile}} </td>
                        <td>{{Carbon\Carbon::parse($user->created_at)->format('d/m/Y')}}</td>
                        <td>
                            <a class="btn btn-success" href="{{router('user.edit',$user)}}"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-danger"  href=""><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>Nenhum usuário cadastrado...</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
@endsection
