<div class="panel panel-primary" id="no_existe">
    <div class="panel-heading">
      <h3 class="panel-title">Realizar Factura</h3>
    </div>

    <div class="panel-body">
      <form id="factura" class="head-factura">
        {{ csrf_field() }}   
        <input type="text" class="form-control" name="_token" id="token" value="{{ csrf_token() }}" style="display:none">
        
        <div class="row">
          <div class="col-sm-12">
            <div class="col-sm-1">
              <div class="form-group">
                <label for="no_factura">No. Factura</label>
                <input type="text" class="form-control" name="no_factura" id="no_factura" value="{{$numero}}" readonly="true">
              </div>
            </div>
          </div>            
        </div>

        <div class="row">
          <div class="col-sm-12">
             
            <div class="col-sm-2">
              <div class="form-group">
                <label for="">Cantidad</label>
                <input type="text" class="form-control">                
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="">Producto</label>
                <select name="nom_producto" id="nom_producto" class="form-control seleccionar">
                  <option value="0">Producto</option>
                  @foreach($productos as $producto)
                    <option value="{{$producto->idProducto}}">{{$producto->nomProducto}}</option>
                  @endforeach
                </select>                              
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="">Precio</label>
                <select name="precio_prod" id="precio_prod" class="form-control seleccionar">
                  <option value="a">Precio</option>
                </select>  
              </div>
            </div>
             <div class="col-sm-2">
              <div class="form-group">
                <label for="">Sub Total</label>
                <input type="text" class="form-control" readonly="true">
              </div>
            </div>            
            <div class="col-sm-2">
              <div class="form-group">
                <label>&nbsp;</label>
                <button type="button" id="btn_agregar" class="btn btn-primary btn-as-block"><i class="fa fa-plus-circle" style="margin-right: 5px;"></i>Agregar</button>                            
              </div>
            </div>                 
          </div>

        </div>  
      </form>

      <form id="factura_body" class="head-factura">
        <div class="row">
          <div class="col-sm-12">
            <table id="creacion_factura" class="display table table-responsive table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Cantidad</th>
                  <th>Precio Unitario</th>
                  <th>Subtotal</th>                  
                  <th>Opción</th>
                </tr>
              </thead>

              <tbody>               
                <tr>                
                  <td>
                    <div class="form-group" style="width:100% !important;" hidden="true">                                              
                      <input type="text" class="form-control" name="test[]" style="width:100% !important;" readonly="true" >
                    </div>
                    prueba
                  </td>
                  <td>
                    <div class="form-group" style="width:100% !important;" hidden="true">                                              
                      <input type="text" class="form-control" name="test[]" style="width:100% !important;" readonly="true" >
                    </div>
                  </td>
                  <td>
                    <div class="form-group" style="width:100% !important;" hidden="true">                                              
                      <input type="text" class="form-control" name="test[]" style="width:100% !important;" readonly="true">
                    </div>
                  </td>
                  <td>
                    <div class="form-group" style="width:100% !important;" hidden="true">                                              
                      <input type="text" class="form-control" name="test[]" style="width:100% !important;" readonly="true">
                    </div>
                  </td>
                  <td>
                    <div class="form-group" style="width:100% !important;" hidden="true">                                              
                      <input type="text" class="form-control" name="test[]" style="width:100% !important;" readonly="true">
                    </div>
                  </td>                                
                  <td> 
                    <button type="button" class="btn btn-danger btn-as-block btn-sm btn_borrar_linea">
                      <i class="fa fa-trash" style="margin-right: 5px;">                        
                      </i>
                      Borrar
                    </button> 
                  </td>
                </tr>
              
              </tbody>
            </table>
          </div>
        </div>
        
      </form>

      <div class="row">
        <div class="col-sm-12">
          <div class="col-sm-2">
            <div class="form-group">
              <label for="total_cantidad">Total Productos</label>                        
              <input type="text" class="form-control" name="total_cantidad" id="total_cantidad" readonly="true">
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label for="total_importe">Total Factura Q.</label>
              <input type="text" class="form-control" name="total_importe" id="total_importe" readonly="true">
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>&nbsp;</label>
              <button type="button" id="btn_guardar" class="btn btn-primary btn-as-block"><i class="fa fa-download" style="margin-right: 5px;"></i>Guardar</button>
            </div>
          </div>
        </div>
      </div>

    </div>          
  </div>
  
  <script type="text/javascript" src="{{ asset('js/carga_factura.js') }}"></script>
