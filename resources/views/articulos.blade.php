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
  @if(Session::has('flash_message'))
  <div class="alert alert-success">
    <strong>Success!</strong> {{Session::get('flash_message')}}
  </div> 
  @endif
  <!-- box-body -->
    <div class="box-body">
      {{--  inicio form  --}}
      <form action="{{URL::to('/home/producto')}}" method="POST">
        {{ csrf_field() }}      
        {{--  inicio row  --}}
        <div class="row">
          <div class="col-sm-12">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">Producto</span>
                  <input type="text" class="form-control" name="nomProducto"  id="nomProducto" required>
                </div>
              </div>
            </div>
            <div class="col-sm-7">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">Descripcion</span>
                  <input type="text" class="form-control" name="descripcion_producto" id="descripcion_producto">
                </div>
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Crear</button>
              </div>
            </div>
          </div>
        </div>
        {{--  fin row  --}}
      </form>
      {{--  fin form  --}}
      {{--  inici box body  --}}
        <div class="box-body">
          <div class="row">
            <div class="col-sm-12">
              <table id="Productos" class="display" >
                <thead>
                <tr>
                  <th>id</th>
                  <th>Producto</th>
                  <th>Descripcion</th>
                  <th>Estado</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($producto as $prod) 
                  <tr class="fila">
                    <td>{{ $prod->idProducto }}</td>
                    <td>{{ $prod->nomProducto }}</td>
                    <td>{{ $prod->descripcion_producto }}</td>
                    <td>
                      @if ( $prod->estado == 0)
                        <span class="label label-danger"> Inactivo </span>
                      @elseif ($prod->estado == 1)
                        <span class="label label-success"> Activo </span>
                      @endif                    
                    </td>
                  </tr>                
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          {{--  fin box body  --}}
      </div>
      
    </div>
  <!-- /.box-body -->
  
</div>
    
@stop