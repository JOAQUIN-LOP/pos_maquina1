@extends('adminlte::page')

@section('title', 'Articulos')

@section('content_header')
    <h1>Detalle Articulos</h1>
@stop

@section('content')

<!-- Form Element sizes -->
<div class="box box-success">

  <div class="box-header with-border">
    <h3 class="box-title">Detalle Articulo</h3>
  </div>
  @if(Session::has('flash_message'))
  <div class="alert alert-success">
    <strong>Success!</strong> {{Session::get('flash_message')}}
  </div> 
  @endif
  <!-- box-body -->
    <div class="box-body">
      {{--  inicio form  --}}
      <form action="{{URL::to('/home/detalle/precio')}}" method="POST">
        {{ csrf_field() }}      
        {{--  inicio row  --}}
        <div class="row">
          <div class="col-sm-3">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon font-bolder">Id</span>
                <input type="text" class="form-control" name="IdProducto" id="IdProducto" readonly required>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon font-bolder">Producto</span>
                <input type="text" class="form-control" name="nomProducto" id="nomProducto" readonly required>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon font-bolder">mes</span>
                  <select class="form-control" name="mesDetalle" id="mesDetalle">
                      <option value="">Seleccione Mes</option>  
                      <option value="1">Enero</option>
                      <option value="2">Febrero</option>
                      <option value="3">Marzo</option>
                      <option value="4">Abril</option>
                      <option value="5">Mayo</option>
                      <option value="6">Junio</option>
                      <option value="7">Julio</option>
                      <option value="8">Agosto</option>
                      <option value="9">Septiembre</option>
                      <option value="10">Octubre</option>
                      <option value="11">Noviembre</option>
                      <option value="12">Diciembre</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon font-bolder">Año</span>
                    <select class="form-control" name="AnioDetalle" id="AnioDetalle">
                        <option value="">Seleccione Anio</option>  
                    </select>
                  </div>
                </div>
              </div>
        </div>
        {{--  fin row  --}}
        <div class="row top-row">
            <div class="col-sm-3">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon font-bolder">Cantidad</span>
                      <input type="text" class="form-control OnlyNumber" name="cantidad_unidades" id="cantidad_unidades" required>
                  </div>
                </div>
              </div>
            <div class="col-sm-3">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon font-bolder">precio total</span>
                  <input type="text" class="form-control" name="precio_total_compras" id="precio_total_compras" required>
                </div>
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                <input type ="button" id="calcular" class="btn btn-primary" value="Calcular">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon font-bolder">precio unidad</span>
                  <input type="text" class="form-control" name="precio_unidad" id="precio_unidad" readonly required>
                </div>
              </div>
            </div>
            <div class="col-sm-3 text-center">
              <div class="form-group">
                <button type ="submit" id="calcular" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
              </div>
            </div>
        </div>
      </form>
      {{--  fin form  --}}
      {{--  inici box body  --}}
        <div class="box-body">
          <div class="row">
            <div class="col-sm-12">
              <table id="tableProduct" class="display" >
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
                    @if ( $prod->estado == 1)
                      <tr class="fila">
                        <td>{{ $prod->idProducto }}</td>
                        <td>{{ $prod->nomProducto }}</td>
                        <td>{{ $prod->descripcion_producto }}</td>
                        <td>
                          @if ($prod->estado == 1)
                            <span class="label label-success"> Activo </span>
                          @endif                    
                        </td>
                      </tr> 
                    @endif                 
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          {{--  fin box body  --}}
      </div>
      <div class="row">
        <div class="col-sm-12">
          <h3 class="box-title">Detalle Articulo</h3>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <table id="detalleProducto" class="display" >
            <thead>
            <tr>
              <th>Producto</th>
              <th>Cantidad</th>
              <th>Precio Unitario</th>
              <th>Precio Total</th>
              <th>Mes</th>
              <th>Anio</th>
              <th>estado</th>
            </tr>
            </thead>
            <tbody>
              @foreach($detalleproducto as $dtprod) 
              <tr>
                <td>{{ $dtprod->producto->nomProducto }}</td>
                <td>{{ $dtprod->cantidad_unidades }}</td>
                <td>{{ $dtprod->precio_unidad }}</td>
                <td>{{ $dtprod->precio_total_compras }}</td>
                <td>{{ $dtprod->mes }}</td>
                <td>{{ $dtprod->anio }}</td>
                <td>
                  @if ( $dtprod->estado == 1)
                    <span class="label label-success"> Activo </span>
                  @endif                    
                </td>
              </tr>                
              @endforeach
            </tbody>
          </table>
        </div>
        {{--  fin box body  --}}
    </div>



    </div>
  <!-- /.box-body -->
  
</div>

@stop