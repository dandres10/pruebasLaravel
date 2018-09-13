<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
                <link href="css/app.css" rel="stylesheet">
                    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" rel="stylesheet">
                        <title>
                            Mi sitio
                        </title>
                    </link>
                </link>
            </meta>
        </meta>
    </head>
    <body>
        <header>
            <?php 
          function   activeMenu($url){
              return request()->
            is($url) ? 'active' : '' ;
          }  
        ?>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="{{ route('home') }}">
                    LogPul
                </a>
                <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button">
                    <span class="navbar-toggler-icon">
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li ")"="" class="nav-item active activeMenu(">
                            <a class="nav-link" href="{{route('home')}}">
                                Inicio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('saludos','Andres')}}">
                                Saludo
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('messages.create')}}">
                                Contacto
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item ">
                            @if (auth()->check())
                            <a class="nav-link" href="{{route('messages.index')}}">
                                Mensajes
                            </a>
                            @if (auth()->user()->hasRoles(['admin']))
                            <li>
                                <a class="nav-link" href="{{route('usuarios.index')}}">
                                    Usuarios
                                </a>
                            </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="navbarDropdown" role="button">
                                    {{ auth()->user()->name }}
                                </a>
                                <div aria-labelledby="navbarDropdown" class="dropdown-menu">
                                    <a class="dropdown-item" href="logout">
                                        Cerrrar sesion
                                    </a>
                                    <a class="dropdown-item" href="usuarios/{{ auth()->id() }}/edit">
                                        Mi cuenta
                                    </a>
                                </div>
                            </li>
                            @endif 
                            
                            @if (auth()->guest())
                            <a class="nav-link" href="login">
                                Login
                            </a>
                            @endif
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="container">
            @yield('contenido')
            <footer>
                Copyright Ⓒ {{ date('Y')}}
            </footer>
        </div>
        <script crossorigin="anonymous" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
        </script>
        <script crossorigin="anonymous" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js">
        </script>
        <script crossorigin="anonymous" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js">
        </script>
    </body>
</html>