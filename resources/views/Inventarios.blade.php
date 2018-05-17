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
    <input type="text" value="{!!Request::path()!!}" id="route" hidden>
    {{--  inicio form  --}}
      <form id="CrearInventario" action="{{URL::to('/home/inventario')}}" method="POST">
        <input type="text" class="form-control" name="_token" id="token" value="{{ csrf_token() }}" style="display:none">
        <input type="text" value="{{URL::to('home/empresa')}}" id="ruta-Emp" style="display:none" >
        <input type="text" value="{{URL::to('home/inventario/contar')}}" id="rutaInv" style="display:none" >

    
  {{-- inicio datatable  --}}
  <div class="box-body">
    <div class="row">
      <div class="col-sm-12">
        <table id="TablaAll" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
          <thead>
            <th>No.</th>
            <th>Empresa</th>
            <th>Mes</th>
            <th>Año</th>
            <th>Total Productos</th>
            <th>Total Inventario</th>
            <th>Estado</th>
            <th></th>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

{{--  modal ver inventario  --}}

        <div class="modal modal-primary fade" id="modal-primary">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Inventario</h4>
              </div>
              <div class="modal-body">
                
              <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group">
                            <label class="control-label letra-label" for="EditNombre"> Nombre<span class="kv-reqd"> </span></label>
                          <input type="text" id="EditNombre" name="EditNombre" class="form-control " readonly>
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group">
                            <label class="control-label letra-label" for="EditMes"> Mes<span class="kv-reqd"> </span></label>
                          <input type="text" id="EditMes" name="EditMes" class="form-control " readonly>
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group">
                            <label class="control-label letra-label" for="EditAnio"> Año<span class="kv-reqd"> </span></label>
                          <input type="text" id="EditAnio" name="EditAnio" class="form-control " readonly>
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group ">
                            <label class="control-label letra-label" for="CantidadNueva"> Cantidad<span class="kv-reqd"> </span></label>
                          <input type="text" id="CantidadNueva" name="CantidadNueva" class="form-control " readonly>
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group ">
                            <label class="control-label letra-label" for="EditTotal"> Total<span class="kv-reqd"> </span></label>
                          <input type="text" id="EditTotal" name="EditTotal" class="form-control " readonly>
                      </div>
                  </div>
                   <div class="col-sm-12">
                    <hr>
                   </div>
                  <div class="col-sm-12">
                    <form id="formulario2">
                      <table id="AllDetalle" class="table table-striped dt-responsive nowrap" style="width:100%">
                      <thead>
                        <th>No.</th>
                        <th>Producto</th>
                        <th>Precio Unitario</th>
                        <th>Existencia</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                      </thead>
                      <tbody>
                      </tbody>
                      </table>
                    </form>
                  </div>

              </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


@stop
@section('js')
  <script type="text/javascript" src="{{ asset('js/inventario.js') }}"></script>  
  @stack('js')
  @yield('js')
@stop
