<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>.:TDM:.</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }
        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <!-- Branding Image 
                <a class="navbar-brand" href="{{ url('/') }}">
                    Inicio
                </a>
                -->

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/TorneoParticipante') }}">TorneoParticipante</a></li>
                            <li><a href="{{ url('/TorneoParticipante/show') }}">Grupos</a></li>
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Registro</a></li>
                        @else
                            
                        <div class="container-fluid">
                                <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>	
                                </button>
                                <a class="navbar-brand" href="#">{{ Auth::user()->name }}</a>
                                
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li><a href="{{ url('/clase') }}">Clase</a></li>
                                    <li><a href="{{ url('/userinformation') }}">Mi Info</a></li>
                                    <!-- PROFESOR -->
                                    @if (Auth::user()->nivel>1)
                                        <li><a href="{{ url('/asistencia') }}">Asistencia</a></li>
                                        <li><a href="{{ url('/TorneoParticipante') }}">TorneoParticipante</a></li>
                                        <li><a href="{{ url('/TorneoParticipante/show') }}">Grupos</a></li>
                                    @endif                     
                                    <!-- ADMINISTRADOR -->
                                    @if (Auth::user()->nivel>10)
                                        <li><a href="{{ url('/InfoAlumno') }}">InfoAlumno</a></li>
                                        <li><a href="{{ url('/contabilidad') }}">Contabilidad</a></li>
                                        <li><a href="{{ url('/informacionadicional') }}">InfoAdicional</a></li>
                                        <li><a href="{{ url('/partido/create') }}">Nuevo Partido</a></li>
                                        <li><a href="{{ url('/Torneo') }}">Nuevo Torneo</a></li>
                                        <li><a href="{{ url('/AsignaGrupo/create') }}">GenGrupos</a></li>
                                    @endif                     
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                </ul>
                            </div>
                        </div>
                        @endif
                    </nav>        
                

    @yield('content')
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>