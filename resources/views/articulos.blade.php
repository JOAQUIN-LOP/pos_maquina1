@extends('adminlte::page')

@section('title', 'Articulos')

@section('content_header')
    <h1>Articulos</h1>
@stop

@section('content')

<!-- Form Element sizes -->
<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Crear Articulo</h3>
  </div>
  <!-- box-body -->
  <div class="box-body">
    <div class="contenedor">
    <div class="row form-group altura-30">
      <div class="col-xs-1">
        <label>Articulo</label>
      </div>
      <div class="col-xs-5">
        <input type="text" class="form-control .input-lg" placeholder="Nombre Articulo">
      </div>
      <div class="col-xs-1">
        <label>Unidad</label>
      </div>
      <div class="col-xs-5">
        <input type="text" class="form-control .input-lg" placeholder="Unidad">
      </div>
    </div>  
    
    <div class="row form-group altura-30">
      <div class="col-xs-1">
        <label>Precio Compra</label>
      </div>
      <div class="col-xs-5">
        <input type="text" class="form-control .input-lg" placeholder="Precio Compra">
      </div>
      <div class="col-xs-1">
        <label>Existencia</label>
      </div>
      <div class="col-xs-5">
        <input type="text" class="form-control .input-lg" placeholder="Existencia">
      </div>
    </div>  

    <div class="row form-group altura-30">
      <div class="col-xs-1">
        <label>Tipo</label>
      </div>
      <div class="col-xs-5">
        <input type="text" class="form-control .input-lg" placeholder="Tipo">
      </div>
      <div class="col-xs-1">
        <label>No. Inventario</label>
      </div>
      <div class="col-xs-5">
        <input type="text" class="form-control .input-lg" placeholder="No. Inventario">
      </div>
    </div>

    <div class="row form-group altura-30">
      <div class="col-xs-1">
        <label>Estado</label>
      </div>
      <div class="col-xs-5">
        <label>
                  <input type="radio" name="r1" class="minimal">
                </label>
      </div>
    </div>

    <div class="row form-group altura-30">
      <div class="col-xs-4">
        <button type="button" class="btn btn-block btn-success btn-lg"><i class="fa fa-save"></i> Guardar</button>
      </div>
      <div class="col-xs-4">
        <button type="button" class="btn btn-block btn-warning btn-lg"><i class="fa fa-edit"></i> Actualizar</button>
      </div>
      <div class="col-xs-4">
        <button type="button" class="btn btn-block btn-danger btn-lg"><i class="fa fa-trash"></i> Eliminar</button>
      </div>
    </div>
    
    
  </div>

  </div>
  <!-- /.box-body -->
</div>
    
@stop