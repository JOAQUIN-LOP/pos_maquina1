@extends('adminlte::page')

@section('title', 'Inventario')

@section('content_header')
    <h1>Inventario</h1>
@stop

@section('content')

<!-- Form Element sizes -->
<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Inventario</h3>
  </div>
  <!-- box-body -->
<div class="box-body">
        <input type="text" value="{!!Request::path()!!}" id="route" hidden>
      {{--  inicio form  --}}
      <form id="CrearInventario" action="{{URL::to('/home/inventario')}}" method="POST">
        <input type="text" class="form-control" name="_token" id="token" value="{{ csrf_token() }}" style="display:none">
        {{ csrf_field() }}      
        {{--  inicio row  --}}
        <div class="row">
          <div class="col-sm-12">
            <div class="col-sm-2">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">No.</span>
                  <input type="text" class="form-control" name="idInventario"  id="idInventario" placeholder="Inventario" required>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">Empresa</span>
                  <input type="text" class="form-control" name="idEmpresa" id="idEmpresa">
                </div>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">mes</span>
                  <input type="text" class="form-control" name="mes" id="mes" readonly>
                </div>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">Año</span>
                  <input type="text" class="form-control" name="anio" id="anio" readonly>
                </div>
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                <button type="submit" id="btn-Guardar" class="btn btn-primary"><i class="fa fa-save"></i> Crear</button>
              </div>
            </div>
          </div>
        </div>
        {{--  fin row  --}}
      </form>
              <table id="All" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <th>No.</th>
                  <th>Empresa</th>
                  <th>Mes</th>
                  <th>Año</th>
                  <th>Total Productos</th>
                  <th>Total Inventario</th>
                  <th>Estado</th>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


  </div>  
</div>
  <!-- /.box-body -->
</div>
    
@stop
@section('js')
  <script type="text/javascript" src="{{ asset('js/inventario.js') }}"></script>  
  @stack('js')
  @yield('js')
@stop
