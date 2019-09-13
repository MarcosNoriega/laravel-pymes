@extends('layout')

@section('contenido')

    <div class="card sombra">
        <div class="card-body">
            <h2 class="card-title display-3">Pymes Demo Mejorada</h2>
            <p class="card-text lead">Este ejemplo esta desarrollado con las siguientes tecnologias:</p>
            <p class="card-text lead">BackEnd: PHP con Laravel y mysql.</p>
            <p class="card-text lead">FrontEnd: HTML, CSS, JavaScript, Bootstrap, Jquery y Ajax.</p>

            <a href="{{ route('Articulos.index') }}" class="btn btn-primary">Ver ABMC Articulos</a>
        </div>
    </div>

@stop