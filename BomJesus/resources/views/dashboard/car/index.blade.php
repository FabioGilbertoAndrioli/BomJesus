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
        <a href="{{route('car.create')}}" class="btn btn-info"><i class="fa fa-archive"></i> CADASTRAR</a>
    </div> <!-- register -->
    <div class="search">
        <form>
            <input type="text" name="search" />
            <button type="submit">Buscar <i class="fa fa-search"></i></button>
        </form>
    </div><!-- search -->
</div> <!-- header-reserve -->
    <div class="my-panel-car">
        @forelse ($cars as $car)
        <div class="thumbnail-car">
                <div class="actions">
                    <a class="btn btn-warning" href="{{route('car.edit',$car)}}"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger" href="{{route('car.confirm.delete',$car)}}"><i class="fa fa-trash"></i></a>
                </div>
                <div class="clear"></div>
                <div class="title">{{$car->name}}</div>

                <div class="info">
                    <hr>
                    <div class="info-capacity">CAPACIDADE
                        <div>{{$car->cpdDispositive}}</div>
                    </div>
                    <hr>
                    <div class="info-slot">Slot usados
                        <div>30</div>
                    </div>
                    <hr>
                    <div class="info-dimension">DIMENSÃO
                        <div>{{$car->measure}}</div>
                    </div>
                </div>
            </div>
            <div class="thumbnail-car">
                    <div class="actions">
                        <a class="btn btn-warning" href="{{route('car.edit',$car)}}"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger" href="{{route('car.confirm.delete',$car)}}"><i class="fa fa-trash"></i></a>
                    </div>
                    <div class="clear"></div>
                    <div class="title">{{$car->name}}</div>

                    <div class="info">
                        <hr>
                        <div class="info-capacity">CAPACIDADE
                            <div>{{$car->cpdDispositive}}</div>
                        </div>
                        <hr>
                        <div class="info-slot">Slot usados
                            <div>30</div>
                        </div>
                        <hr>
                        <div class="info-dimension">DIMENSÃO
                            <div>{{$car->measure}}</div>
                        </div>
                    </div>
                </div>
        @empty
            <h1>Nenhum carrinho cadastrado...</h1>
        @endforelse
        {{ $cars->links() }}
    </div>
@endsection
