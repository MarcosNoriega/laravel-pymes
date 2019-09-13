@extends('layout')

@section('contenido')
    <div class="card sombra2">
        <div class="card-header">
            <h1>Gestionar Articulos (Editar)</h1>
        </div>

        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-6">
                    <form action="{{ url('Articulos/update/'. $articulo->IdArticulos) }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="validationCustom04">Nombre *</label>
                            <input type="text" class="form-control" id="validationCustom04" name="Nombre" value="{{ $articulo->Nombre }}" required="">
                            {!! $errors->first('txtNombre', '<span class="invalid-feedback">:message</span>') !!}
                        </div>
                    
                        <div class="form-group">
                            <label for="txtPrecio">Precio *</label>
                            <input type="text" class="form-control" name="Precio" value="{{ $articulo->Precio }}" id="txtPrecio">
                            {{ $errors->first('txtPrecio') }}
                        </div>
                    
                        <div class="form-group">
                            <label for="txtStock">Stock *</label>
                            <input type="text" class="form-control" name="Stock" value="{{ $articulo->Stock }}" id="txtStock">
                            {{ $errors->first('txtStock') }}
                        </div>
                    
                        <div class="form-group">
                            <label for="txtCodigo">Codigo de Barra *</label>
                            <input type="text" class="form-control" name="Codigo" value="{{ $articulo->CodigoDeBarra }}" id="txtCodigo">
                            {{ $errors->first('txtCodigo') }}
                        </div>
                    
                        <div class="form-group">
                            <label for="cboFamilia">Familia *</label>
                            <select class="form-control" name="Familia" id="cboFamilia">
                                    <option value="">Selecciona</option>
                                @foreach($articulosFamilia as $item)
                                    @if($item->IdArticulosFamilia == $articulo->IdArticuloFamilia)
                                        <option value="{{ $item->IdArticulosFamilia }}" selected>{{ $item->Nombre }}</option>
                                    @else
                                        <option value="{{ $item->IdArticulosFamilia }}">{{ $item->Nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    
                        <div class="form-group">
                            <label for="txtFecha">Fecha Alta</label>
                            <input type="datetime-local" class="form-control" name="Fecha" value="{{ $articulo->FechaAlta }}" id="txtFecha">
                        </div>
                    
                        <div class="form-group">
                            <label for="cboActivo">Activo</label>
                            <select class="form-control" name="Activo" id="cboActivo">
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <button class="btn btn-primary" type="submit"><i class="fa fa-check"></i>  Grabar</button>
                        <a href="{{ route('Articulos.index') }}" class="btn btn-warning" type="submit"><i class="fa fa-times"></i>  Cancelar</a>
                    </form>
                </div>
            </div>

        </div>

    </div>

    
@endsection