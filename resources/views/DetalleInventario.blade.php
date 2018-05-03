@extends('adminlte::page')

@section('title', 'Inventario')

@section('content_header')
    <h1>Inventario</h1>
@stop

@section('content')
{{--  div contenedor  --}}
<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Inventario</h3>
  </div>
  <div class="box-body">

  <div class="row">  
    <form id="CrearInventario" action="{{URL::to('')}}" method="POST">
      <input type="text" class="form-control" name="_token" id="token" value="{{ csrf_token() }}" style="display:none">
      <div class="row">
        <div class="col-sm-12">
          <div class="col-sm-2">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon">No.</span>
                <input type="text" class="form-control" name="idInventario"  id="idInventario" placeholder="Inventario" required readonly>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon">Empresa</span>
                  <input type="text" class="form-control" name="empresa"  id="empresa" placeholder="Empresa" required readonly>
              </div>
            </div>
          </div>
          
          <div class="col-sm-2">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon">mes</span>
                <input type="text" class="form-control" name="mes"  id="mes" placeholder="Mes" required readonly>
              </div>
            </div>
          </div>

          <div class="col-sm-2">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon">Año</span>
                <input type="text" class="form-control" name="anio" id="anio" required readonly>
              </div>
            </div>
          </div>

        </div>
      </div>
    </form>
    <div class="row">
      <div class="col-sm-12">
        <div class="col-sm-2">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modal-info"><i class="fa fa-plus"></i> Agregar Producto</button>
        </div>
      </div>
    </div>
  <div>

{{--  modal   --}}

<div class="modal modal-success fade" id="modal-info">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Productos</h4>
      </div>
      <div class="modal-body">
        
        <div class="row">
          
          <div class="col-sm-6">
              <div class="form-group categoria">
                    <label class="control-label letra-label" for="categoria"> Producto</label>
                  <select id="CodProducto" name="CodProducto" class="form-control select2" style="width: 100%;">
                      <option value="">Seleccione Producto</option>
                  </select>
              </div>
          </div>
          <div class="col-sm-12">
            <hr>
          </div>

            <div class="col-sm-12">
              <form id="formulario2">
                <table id="AllProd" class="table table-striped dt-responsive nowrap" style="width:100%">
                <thead>
                  <th>No.</th>
                  <th>Producto</th>
                  <th>Precio Unitario</th>
                  <th>Existencia</th>
                  <th>Cantidad</th>
                  <th>Subtotal</th>
                  <th></th>
                </thead>
                <tbody>
                </tbody>
                </table>
              </form>
            </div>


        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

  {{-- inicio datatable  --}}
  <div class="box-body">
    <div class="row">
      <div class="col-sm-12">
        <table id="All" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
          <thead>
            <th>No.</th>
            <th>Producto</th>
            <th>Mes</th>
            <th>Año</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<div class="alert" id="notification-container" style="display:none;">
    <div class="notification">
        <button class="notification-close"></button>
        <div class="notification-title"><span id="titulo"></span> !</div>
        <div class="notification-message"><span id="mensaje"></span></div>
    </div>
</div>
@stop
@section('js')
  <script type="text/javascript" src="{{ asset('js/detalleInventario.js') }}"></script>  
  @stack('js')
  @yield('js')
@stop
