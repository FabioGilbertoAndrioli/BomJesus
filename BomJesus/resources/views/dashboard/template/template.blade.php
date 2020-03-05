<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="{{ asset('/css/dashboard.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/resource/icon/css/font-awesome.min.css') }}">
        <script src="{{ asset('/js/app.js') }}"></script>
        <script src="{{ asset('/js/message.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

        <title>Dashboard</title>
    </head>
    <body>

        <header class="header">
            <div class="logo">
                <h3>BPARPR-system </h3>
                <p>V-1.0</p>
            </div> <!-- logo -->
            <nav class="navbar">
                <div class="clear"></div> <!-- clear -->
                <ul>
                    <li><a href=""><i class="fa fa-user fa-1x"></i> Perfil</a></li>
                    <li><a href=""><i class="fa fa-sign-out fa-1x"></i> Sair</a></li>
                </ul>
            </nav> <!-- navbar -->
            <div class="clear"></div> <!-- clear -->
        </header> <!-- header -->
        <main>
            <div class="side">
                <nav class="sidebar">
                    <ul>
                    <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i> HOME</a></li>
                        <hr>
                        <li><a href="{{route('user.index')}}"><i class="fa fa-users"></i> USUÁRIOS</a></li>
                        <hr>
                        <li><a href="{{route('reserve.index')}}"><i class="fa fa-calendar"></i> RESERVA</a></li>
                         <!-- <hr>
                        <li><a href=""><i class="fa fa-envelope"></i> SOLICITAÇÕES</a></li>-->
                        <hr>
                         <li><a href="{{route('room.index')}}"><i class="fa fa-university"></i> SALAS</a></li>
                        <hr>
                         <li><a href="{{route('car.index')}}"><i class="fa fa-archive"></i> CARRINHOS</a></li>
                        <hr>
                         <li><a href="{{route('device.index')}}"><i class="fa fa-cubes"></i> DISPOSITIVOS</a></li>
                        <hr>
                        <li><a href=""><i class="fa fa-print"></i> TONERS</a></li>
                        <hr>
                    </ul>
                </nav> <!-- sidebar -->
            </div><!-- side -->
            <div class="content">
                @yield('content')
            </div><!-- content -->
            <div class="clear"></div> <!-- clear -->
        </main>
        @isset($chart)
            {!! $chart->script() !!}
            {!! $usercharts->script() !!}
        @endisset
        <script src="{{mix('/js/app.js')}}"></script>
    </body>
</html>
