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
    @if(isset($device))
        <form action="{{route('device.update',$device)}}" method="POST" >
        {{ method_field('PUT') }}
    @else
        <form action="{{route('device.store')}}" method="POST" >
    @endif
        @csrf
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputNome">Nome do dispositivo</label>
                <input type="text" value="{{$device->name ?? ''}}" name="name" class="form-control" id="inputNome" placeholder="Nome do dispostivo">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputModel">Modelo</label>
                <input type="text" value="{{$device->model ?? ''}}" name="model" class="form-control" id="inputModel" placeholder="Modelo do dispostivo">
            </div>
            <div class="form-group col-md-4">
                <label for="inputBrand">Marca</label>
                <input type="text" value="{{$device->brand ?? ''}}" name="brand" class="form-control" id="inputBrand" placeholder="Marca do dispositivo">
            </div>
            <div class="form-group col-md-4">
                <label for="inputIp">IP</label>
                <input type="text" value="{{$device->ip ?? ''}}" name="ip" class="form-control" id="inputIp" placeholder="IP do dispositivo">
            </div>
        </div>
        <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputSerie">Numero de série</label>
                    <input type="text" value="{{$device->serialNumber ?? ''}}" name="serialNumber" class="form-control" id="inputSerie" placeholder="Numero de série">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPatrimonio">Patrimonio</label>
                    <input type="text" value="{{$device->patrimony ?? ''}}" name="patrimony" class="form-control" id="inputPatrimonio" placeholder="Numero de patrimônio">
                </div>
            </div>

            @if(isset($device))
                <div class="form-group col-md-8">
                    <label for="inputDate">Data de registro</label>
                    <input @if(isset($device)) value="{{Carbon\Carbon::parse($device->created_at)->format('Y-m-d') }}" @endif disabled type="date" class="form-control" id="inputDate">
                </div>
            @endif
        </div>
        <a class="btn btn-info" href="{{ route('device.index') }}">VOLTAR</a>
        <button type="submit" class="btn btn-primary">Enviar</button>
        @if(isset($device))
            <a href="{{route('device.confirm.delete',$device)}}" class="btn btn-danger">Deletar</a>
        @endif
    </form>
</div>
@endsection
