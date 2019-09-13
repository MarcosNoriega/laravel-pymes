@extends('layout')

@section('contenido')
    <div>
        <h1 style="text-shadow: 5px 5px 5px #aaa">Imagenes del Articulo {{ $articulo->Nombre }}</h1>
        <a href="{{ route('Articulos.index') }}" class="btn btn-primary btn-sm ml-3">Volver a la lista de articulos</a>


        <a href="#formImagen" class="btn btn-primary btn-sm" data-toggle="collapse" href="#formImagen" role="button" aria-expanded="false" aria-controls="formImagen">Subir Imagenes</a>
        <div class="collapse" id="formImagen">
            <div class="card mt-3">
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="file" name="imagen" id="" class="form-control">
                        <button type="submit" class="btn btn-primary btn-sm">Subir</button>
                    </form>
                
                </div>
            </div>
        </div>
        
    </div>

    <div class="row">
    @foreach($imagenes as $imagen)
        <div class="col-md-3">
            <div class="card sombra mt-3">
                <a rel="group" href="{{ asset($imagen->ruta) }}" class="imagenesGaleria"><img class="card-img-top img-fluid" src="{{ asset($imagen->ruta) }}" alt=""></a>

                <div class="card-footer">
                    <form action="{{ url('Imagen/delete/'. $imagen->Id) }}" method="post" class="form-delete-imagen">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-sm btn-block">Eliminar</button>
                    </form>
                </div>
            </div>

            
        </div>
        
    @endforeach
    </div>
@stop

