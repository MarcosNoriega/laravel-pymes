@extends('layout')

@section('contenido')
    <div class="card sombra2">
        <div class="card-header">
            <h1>Gestionar Articulos (Agregar)</h1>
        </div>

        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-6">
                    <form action="{{ route('Articulos.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="validationCustom04">Nombre *</label>
                            <input type="text" class="form-control" id="validationCustom04" name="Nombre" required="">
                            {!! $errors->first('txtNombre', '<span class="invalid-feedback">:message</span>') !!}
                        </div>
                    
                        <div class="form-group">
                            <label for="txtPrecio">Precio *</label>
                            <input type="text" class="form-control" name="Precio" id="txtPrecio">
                            {{ $errors->first('txtPrecio') }}
                        </div>
                    
                        <div class="form-group">
                            <label for="txtStock">Stock *</label>
                            <input type="text" class="form-control" name="Stock" id="txtStock">
                            {{ $errors->first('txtStock') }}
                        </div>
                    
                        <div class="form-group">
                            <label for="txtCodigo">Codigo de Barra *</label>
                            <input type="text" class="form-control" name="Codigo" id="txtCodigo">
                            {{ $errors->first('txtCodigo') }}
                        </div>
                    
                        <div class="form-group">
                            <label for="cboFamilia">Familia *</label>
                            <select class="form-control" name="Familia" id="cboFamilia">
                                    <option value="">Selecciona</option>
                                @foreach($articulosFamilia as $item)
                                    <option value="{{ $item->IdArticulosFamilia }}">{{ $item->Nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <div class="form-group">
                            <label for="txtFecha">Fecha Alta</label>
                            <input type="datetime-local" class="form-control" name="Fecha" id="txtFecha">
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
                </ class="col-6">
            </div>

        </div>

    </div>

    
@endsection