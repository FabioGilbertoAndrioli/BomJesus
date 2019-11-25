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
        <a href="{{route('chrome.create')}}" class="btn btn-info"><i class="fa fa-calendar"></i> CADASTRAR</a>
    </div> <!-- register -->
    <div class="search">
        <form>
            <input type="text" name="search" />
            <button type="submit">Buscar</button>
        </form>
    </div><!-- search -->
</div> <!-- header-chrome -->
<div class="my-panel">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nome</th>
                <th scope="col">Nº serie</th>
                <th scope="col">Modelo</th>
                <th scope="col">Local</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($chromes as $chrome)
                <tr>
                    <td>{{$chrome->id}}</td>
                    <td>{{$chrome->name}}</td>
                    <td>{{$chrome->ip}}</td>
                    <td>{{$chrome->serialNumber}}</td>
                    <td>{{$chrome->model}}</td>
                    <td>SALA 21</td>
                    <td>
                        <a class="btn btn-success" href="{{route('chrome.edit',$chrome)}}"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger"  href="{{route('chrome.confirm.delete',$chrome)}}"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>Nenhum dispositivo cadastrado...</td>
                </tr>
            @endforelse

        </tbody>
    </table>
    {{ $chromes->links() }}
</div><!-- my-panel -->
@endsection
