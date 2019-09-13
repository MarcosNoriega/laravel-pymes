@extends('layout')

@section('contenido')

    <div class="card sombra2">
        
        <div class="card-header">
            <h1>Gestionar Articulos</h1>
        </div>

        <div class="card-body">
            <p><span id="articulosTotal">{{ $articulos->total() }}</span> Registros | Pagina {{$articulos->currentPage()}} 
                de {{$articulos->lastPage()}}
                
            </p>



            <div class="row justify-content-between mb-3">

                <div class="col-3">
                    <a href="{{ route('Articulos.create') }}" class="btn btn-primary btn-sm mb-3"><i class="fa fa-plus"></i>  Agregar</a>
                </div>

                <div class="col-4">
                    <form class="form-inline" action="" method="get">
                        <div class="form-group">
                            <label for="consulta">Consultar</label>
                            <input type="text" class="form-control ml-2" name="consulta" id="consulta">
                        </div>
                    </form>
                </div>
            </div>

            <div class="alert alert-success" id="infoDelete" role="alert">
                
            </div>

            <table class="table table-sm" style="color: black">
                <thead class="thead-dark">
                    <tr>
                        <th class="d-none d-md-block">Id</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Fecha</th>
                        <th class="d-none d-md-block">Activo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($articulos as $articulo)
                    <tr>
                        <td class="d-none d-md-block">{{ $articulo->IdArticulos }}
                        <td>{{ $articulo->Nombre }}</td>
                        <td>{{ $articulo->Precio }}</td>
                        <td>{{ $articulo->Stock }}</td>
                        <td>{{ $articulo->FechaAlta }}</td>
                        <td class="d-none d-md-block">{{ $articulo->Activo }}</td>
                        <td>
                            <form action="http://pymes-app.com/Articulos/delete/{{ $articulo->IdArticulos }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                                <a href="{{ url('Articulos/delete/'. $articulo->IdArticulos) }}" class="delete" data-toggle="tooltip" data-placement="top" title="Borrar"><i class="fa fa-trash-alt"></i></a>
                                <a href="{{ url('Articulos/edit/' . $articulo->IdArticulos) }}" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit ml-2"></i></a>
                                <a href="{{ url('Imagen/'. $articulo->IdArticulos) }}" data-toggle="tooltip" data-placement="top" title="Galeria de Imagenes"class="ml-2"><i class="fa fa-image"></i>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="row justify-content-center mt-3">
                <div class="col-md-6">
                    {!! $articulos->render() !!}
                </div>
            </div>

            <table class="table table-sm" id="tablaConsulta">
                <thead class="thead-dark">
                    <tr>
                        <th class="d-none d-md-block">Id</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Fecha</th>
                        <th class="d-none d-md-block">Activo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody id="tconsultas">
                
                </tbody>
            </table>                    
            
        </div>

    </div>

@stop