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
    
    <div class="row form-group">
      <div class="col-xs-1">
        <label>Producto</label>
      </div>
      <div class="col-xs-5">
        <input type="text" class="form-control .input-lg" placeholder=".col-xs-5">
      </div>
      <div class="col-xs-1">
        <label>Unidad</label>
      </div>
      <div class="col-xs-5">
        <input type="text" class="form-control .input-lg" placeholder=".col-xs-5">
      </div>
    </div>  
    
    <div class="row form-group">
      <div class="col-xs-1">
        <label>Precio Compra</label>
      </div>
      <div class="col-xs-5">
        <input type="text" class="form-control .input-lg" placeholder=".col-xs-5">
      </div>
      <div class="col-xs-1">
        <label>Existencia</label>
      </div>
      <div class="col-xs-5">
        <input type="text" class="form-control .input-lg" placeholder=".col-xs-5">
      </div>
    </div>  

    <div class="row form-group ">
      <div class="col-xs-1">
        <label>Tipo</label>
      </div>
      <div class="col-xs-5">
        <input type="text" class="form-control .input-lg" placeholder=".col-xs-5">
      </div>
      <div class="col-xs-1">
        <label>No. Inventario</label>
      </div>
      <div class="col-xs-5">
        <input type="text" class="form-control .input-lg" placeholder=".col-xs-5">
      </div>
    </div>

    <div class="row form-group ">
      <div class="col-xs-1">
        <label>Estado</label>
      </div>
      <div class="col-xs-5">
        <label>
                  <input type="radio" name="r1" class="minimal">
                </label>
      </div>
    </div>

    <div class="row form-group ">
      <div class="col-xs-4">
        <button type="button" class="btn btn-block btn-success btn-lg">Primary</button>
      </div>
      <div class="col-xs-4">
        <button type="button" class="btn btn-block btn-warning btn-lg">Primary</button>
      </div>
      <div class="col-xs-4">
        <button type="button" class="btn btn-block btn-danger btn-lg">Primary</button>
      </div>
    </div>
    
    


  </div>
  <!-- /.box-body -->
</div>
    
@stop