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
    @if(isset($car))
        <form action="{{route('car.update',$car)}}" method="POST" >
        {{ method_field('PUT') }}
    @else
        <form action="{{route('car.store')}}" method="POST" >
    @endif
        @csrf
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputNome">* Nome</label>
                <input type="text" value="{{$car->name ?? ''}}" name="name" class="form-control" id="inputNome" placeholder="Nome do carrinho">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputCpd">Capacidade</label>
                <input type="number" value="{{$car->cpdDispositive ?? ''}}" name="cpdDispositive" class="form-control" id="inputCpd" placeholder="Capacidade">
            </div>
        </div>
        <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputMeasure">Dimensões</label>
                    <input type="text" value="{{$car->measure ?? ''}}" name="measure" class="form-control" id="inputMeasure" placeholder="Dimensões">
                </div>
            </div>

            @if(isset($car))
                <div class="form-group col-md-8">
                    <label for="inputDate">Data de registro</label>
                    <input @if(isset($car)) value="{{Carbon\Carbon::parse($car->created_at)->format('Y-m-d') }}" @endif disabled type="date" class="form-control" id="inputDate">
                </div>
            @endif
        </div>
        <a class="btn btn-info" href="{{ route('car.index') }}">VOLTAR</a>
        <button type="submit" class="btn btn-primary">Enviar</button>
        @if(isset($car))
            <a href="{{route('car.confirm.delete',$car)}}" class="btn btn-danger">Deletar</a>
        @endif
    </form>
</div>
@endsection
