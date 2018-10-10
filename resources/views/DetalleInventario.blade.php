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
                <input type="text" class="form-control" name="NoInventario"  id="NoInventario" placeholder="NoInventario" required readonly>
                <input type="text" class="form-control" name="idInventario"  id="idInventario" placeholder="Inventario" required readonly style="display:none;">
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
                 <select id="mes" name="mes" class="form-control" readonly style="width:100%">
                  </select>
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
          <button class="btn btn-primary" id="modalS"><i class="fa fa-plus"></i> Agregar Producto</button>
        </div>
      </div>
    </div>
  <div>

{{--  modal   --}}

<div class="modal modal-default fade" id="modalSuccess"  style="overflow-y: scroll; background-color: rgba(0,0,0,0.8);">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Agregar Productos A Inventario</h4>
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
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


{{--  modal 2  --}}
<div class="modal modal-default fade" id="modal-info" style="overflow-y: scroll; background-color: rgba(0,0,0,0.8);">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Detalle Productos</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <table id="VerMasProducto" class="table table-striped dt-responsive nowrap" style="width:100%">
              <thead>
                <th>No.</th>
                <th>Producto</th>
                <th>Mes</th>
                <th>Año</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th></th>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

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
            <th></th>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

{{--  modal editar cantidad y precio producto en el inventario  --}}
<div class="modal modal-default fade" id="modal-warning">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Editar Registro</h4>
      </div>
      <div class="modal-body">
        
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                      <label class="control-label letra-label" for="EditNombre"> Nombre<span class="kv-reqd"> </span></label>
                    <input type="text" id="EditNombre" name="EditNombre" class="form-control " readonly>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                      <label class="control-label letra-label" for="EditMes"> Mes<span class="kv-reqd"> </span></label>
                    <input type="text" id="EditMes" name="EditMes" class="form-control " readonly>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                      <label class="control-label letra-label" for="EditAnio"> Año<span class="kv-reqd"> </span></label>
                    <input type="text" id="EditAnio" name="EditAnio" class="form-control " readonly>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group ">
                      <label class="control-label letra-label" for="CantidadP"> Cantidad Anterior<span class="kv-reqd"> </span></label>
                    <input type="text" id="CantidadP" name="CantidadP" class="form-control " readonly>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group ">
                      <label class="control-label letra-label" for="CantidadNueva"> Cantidad Nueva<span class="kv-reqd"> </span></label>
                    <input type="number" id="CantidadNueva" name="CantidadNueva" class="form-control " placeholder="Ingrese Nueva Cantidad" onkeypress="return event.charCode >= 48" min="0" maxlength="4">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group ">
                      <label class="control-label letra-label" for="EditTotal"> Total<span class="kv-reqd"> </span></label>
                    <input type="text" id="EditTotal" name="EditTotal" class="form-control " readonly>
                </div>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
        <button type="button" class="btn btn-success"  id="Btn-G">Guardar Cambios</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@stop
@section('js')
  <script type="text/javascript" src="{{ asset('js/detalleInventario.js') }}"></script>  
  <script type="text/javascript" src="{{ asset('js/select2.js') }}"></script>  
  @stack('js')
  @yield('js')
@stop
