@extends('dashboard.template.template')

@section('content')
    <div class="my-container-modal">
        <div class="my-modal">
            <div class="my-modal-title">Confirmação da Exclusão</div>
            <hr>
            <div class="my-modal-content">Deseja excluir a reserva <span class="span-date">{{Carbon\Carbon::parse($reserve->date)->format('d/m/Y') }} </span>da professora Amanda Damaceno</div>
            <div class="my-modal-button">
                <a class="btn btn-info" href="{{ url()->previous() }}">VOLTAR</a>
                <a class="btn btn-danger"href="{{route('reserve.delete',$reserve)}}">DELETE</a>
            </div>
        </div>
    </div>
@endsection
