@extends('layout')

@section('contenido')
    <div class="card sombra2">
        <div class="card-header">
            <h1>Gestionar Articulos Familias</h1>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col">
                    <a href="#collapseForm" class="btn btn-primary btn-sm" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseForm">Añadir Nueva Categoria</a>

                    <div class="collapse" id="collapseForm">
                        <div class="card card-body">
                            <form action="{{ route('ArticulosFamilia.store') }}" method="post" id="form-crear">
                                {{ csrf_field() }}
                                <meta name="csrf-token" content="{{ csrf_token() }}">

                                <div class="form-group">
                                    <label for="txtNombre">Nombre de la Categoria</label>
                                    <input type="text" id="txtNombre" name="txtNombre" class="form-control" required>
                                </div>

                                <button type="submit" class="btn btn-outline-success btn-sm">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>  
            </div>

            <div class="row justify-content-center mt-3">
                <div class="col-md-4">
                    <table class="table table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($articulosFamilia as $item)
                                <tr>
                                    <th>{{ $item->IdArticulosFamilia }}</th>
                                    <th><a href="{{ url('Articulos/filtro/'.$item->IdArticulosFamilia) }}" class="items">{{ $item->Nombre }}</a></th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-md-5">
                    <table class="table table-sm" id="tArt">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Activo</th>
                            </tr>
                        </thead>

                        <tbody id="ListArticulo">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop