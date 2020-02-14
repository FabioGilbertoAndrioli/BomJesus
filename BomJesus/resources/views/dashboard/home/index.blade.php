@extends('dashboard.template.template')
@section('content')
    <div class="panel-home">
        <div class="title">
             <h1>Bem vindo Fábio Gilberto</h1>
        </div>
        <div class="modal-panel">
            <div class="modal-panel chart">
                    {!! $chart->container() !!}
            </div>
            <div class="modal-panel chart">
                {!! $usercharts->container() !!}
            </div>
        </div>
    </div>

@endsection
