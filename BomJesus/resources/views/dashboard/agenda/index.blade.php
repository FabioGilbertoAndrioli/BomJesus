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
        <a href="{{route('reserve.create')}}" class="btn btn-info"><i class="fa fa-calendar"></i> CADASTRAR</a>
    </div> <!-- register -->
    <div class="search">
    <form method="post" action="{{route('reserve.search')}}">
        @csrf
        <input type="text" name="search" />
        <button type="submit">Buscar</button>
    </form>
    </div><!-- search -->
</div> <!-- header-reserve -->
<div class="my-panel">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Nome</th>
            <th scope="col">Aulas</th>
            <th scope="col">Data</th>
            <th scope="col">Registro</th>
            <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reserves as $reserve)
                <tr>
                    <th scope="row">{{$reserve->id}}</th>
                    <td>{{$reserve->user->name}}</td>
                    <td>
                        <ul>
                            @forelse ($reserve->classes as $classe)
                                <li class="list-classes">{{$classe}}</li>
                            @empty
                            <li class="list-classes">Nehuma aula selecionada</li>
                            @endforelse

                        </ul>
                    </td>
                    <td>{{Carbon\Carbon::parse($reserve->date)->format('d/m/Y')}}</td>
                    <td>{{Carbon\Carbon::parse($reserve->created_at)->format('d/m/Y')}}</td>
                    <td>
                        <a class="btn btn-success" href="{{route('reserve.edit',$reserve)}}"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger"  href="{{route('reserve.confirm.delete',$reserve)}}"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>Nenhuma reserva cadastrada...</td>
                </tr>
            @endforelse

        </tbody>
    </table>
    {{ $reserves->links() }}
</div><!-- my-panel -->
@endsection
