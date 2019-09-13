<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pymes</title>
    <link rel="stylesheet" href="{{ asset('css/myStyles.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('js/appAjax.js') }}"></script>
    
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.6/jquery.fancybox.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.6/jquery.fancybox.js"></script>
    

</head>
<body class="fondo">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Pymes</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ request()->is('home')? 'active' : ''}}">
                        <a class="nav-link" href="{{ route('home') }}">Inicio<span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item {{ request()->is('Articulos') || request()->is('Articulos/create')? 'active' : ''}}">
                        <a class="nav-link" href="{{ route('Articulos.index') }}">Articulos</a>
                    </li>

                     <li class="nav-item {{ request()->is('ArticulosFamilia')? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('ArticulosFamilia.index') }}">Articulos Familia</a>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             Reportes
                        </a>


                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Informe de compras</a>
                        <a class="dropdown-item" href="#">Informe de ventas</a>
                         <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Informe de devoluciones de clientes</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Informe de devoluciones a proveedores</a>
                    </div>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Acerca de</a>
                    </li>

                    <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                    </li>
                </ul>

                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                
            </div>
        </nav>


    <div class="container">
        <div class="row mt-5">
            <div class="col">
                @yield('contenido')
            </div>
        </div>
    </div>
</body>
</html>