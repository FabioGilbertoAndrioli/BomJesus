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
        <a href="{{route('room.create')}}" class="btn btn-info"><i class="fa fa-archive"></i> CADASTRAR</a>
    </div> <!-- register -->
    <div class="search">
        <form>
            <input type="text" name="search" />
            <button type="submit">Buscar <i class="fa fa-search"></i></button>
        </form>
    </div><!-- search -->
</div> <!-- header-reserve -->
{{ $rooms->links() }}
    <div class="my-panel-room">
        <div class="row">
            @forelse ($rooms as $room)
            <div @if($room->type == 'Pedagogico') style="background:#20810057" @endif class="thumbnail-room">
                    <div class="actions">
                        <a class="btn btn-warning" href="{{route('room.edit',$room)}}"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger" href="{{route('room.confirm.delete',$room)}}"><i class="fa fa-trash"></i></a>
                    </div>
                    <div class="clear"></div>
                    <div class="title">{{$room->name}}</div>

                    <div class="info">
                        <hr>
                        <div class="info-capacity">{{$room->type}}</div>
                        <hr>
                            @if($room->level != null)
                                <div class="info-slot">{{$room->level}}</div>
                            @else
                                <div class="info-slot">Não possui nível</div>
                            @endif
                        <hr>
                        <div class="info-device">DISPOSITIVOS
                                <table class="table">
                                        <thead>
                                            <tr>
                                            <th scope="col">id</th>
                                            <th scope="col">Nome</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Chromebook</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Projetor Cassio</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>AR CONDICIONADO</td>
                                            </tr>

                                        </tbody>
                                    </table>
                        </div>
                    </div>
                </div>

            @empty
                <h1>Nenhuma sala cadastrada...</h1>
            @endforelse

        </div>
        {{ $rooms->links() }}
    </div>
@endsection
