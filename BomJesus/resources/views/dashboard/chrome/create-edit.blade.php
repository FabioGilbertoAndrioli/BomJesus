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
    @if(isset($chrome))
        <form action="{{route('chrome.update',$chrome)}}" method="POST" >
        {{ method_field('PUT') }}
    @else
        <form action="{{route('chrome.store')}}" method="POST" >
    @endif
        @csrf
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputSerie">* Numero de série</label>
                <input type="text" value="{{$chrome->serieNumber ?? ''}}" name="serieNumber" class="form-control" id="inputSerie" placeholder="Número de série">
            </div>
        </div>
        <div class="form-row">

                <div class="form-group col-md-12">
                    <label for="inputPatrimonio">Patrimonio</label>
                    <input type="text" value="{{$chrome->patrimony ?? ''}}" name="patrimony" class="form-control" id="inputPatrimonio" placeholder="Numero de patrimônio">
                </div>
            </div>

            @if(isset($chrome))
                <div class="form-group col-md-8">
                    <label for="inputDate">Data de registro</label>
                    <input @if(isset($chrome)) value="{{Carbon\Carbon::parse($chrome->created_at)->format('Y-m-d') }}" @endif disabled type="date" class="form-control" id="inputDate">
                </div>
            @endif
        </div>
        <a class="btn btn-info" href="{{ route('chrome.index') }}">VOLTAR</a>
        <button type="submit" class="btn btn-primary">Enviar</button>
        @if(isset($chrome))
            <a href="{{route('chrome.confirm.delete',$chrome)}}" class="btn btn-danger">Deletar</a>
        @endif
    </form>
</div>
@endsection
