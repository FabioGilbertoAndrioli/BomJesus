@extends('dashboard.template.template')

@section('content')
    <div class="my-container-modal">
        <div class="my-modal">
            <div class="my-modal-title">Confirmação da Exclusão</div>
            <hr>
            <div class="my-modal-content">Deseja excluir o usuário <span class="span-date">{{$user->name}} </span></div>
            <div class="my-modal-button">
                <a class="btn btn-info" href="{{ url()->previous() }}">VOLTAR</a>
                <a class="btn btn-danger"href="{{route('user.delete',$user)}}">DELETE</a>
            </div>
        </div>
    </div>
@endsection
