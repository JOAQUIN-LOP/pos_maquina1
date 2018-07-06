<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Response;
use Validator;
use App\Sucursal;
use App\InvSucursal;
USE App\DetalleInventarioSucursal;
use DB;
use Carbon\Carbon;

class DetalleInvSucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sucursal = DB::table('sucursal as suc')
            ->join('empresa as emp', 'suc.idEmpresa','=','emp.idEmpresa')            
                ->select('emp.idEmpresa','emp.nom_empresa', 'suc.idSucursal', 'suc.nom_sucursal')
                    ->where('suc.estado','=',1)
                        ->groupBy('suc.nom_sucursal')
                            ->orderBy('suc.nom_sucursal')
                                ->get();    

        if (count($sucursal) > 0) {
        
            return view('DetalleInvSucursal', compact('sucursal'));    
        
        }else{
            return view('sin_contenido');
        }
    }


    public function verInventarioActivo(Request $request, $id){

        if ($request -> ajax()) {
         
                $inventario = DB::table('inventario_sucursal')
                    ->select('idInventarioSucursal','anio', 'mes', 'num_inventario_sucursal')
                        ->where('idSucursal',$id)
                        ->where('estado', 1)                                                                    
                            ->get();    
                

                $data = json_encode($inventario);

                return $data;                 
       }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    

    public function cargarDetalle(Request $request, $id){

         if ($request -> ajax()) {            
            $num_inventario = DB::table('inventario_sucursal')                
                ->select("num_inventario_sucursal")
                    ->where('idSucursal',$id)
                    ->where('estado',1)                        
                        ->get();                      

            $productos = DB::table('detalle_producto as det')
                ->join('producto as prod', 'det.idProducto','=','prod.id')            
                    ->select("det.idProducto", "prod.nomProducto")
                        ->groupBy('prod.nomProducto')
                            ->orderBy('prod.nomProducto')
                            ->get();

       
            $numero = $num_inventario[0]->num_inventario_sucursal;

            return view('precio_detalle_inventario', compact('numero', 'productos'));
        }
        
    }

    public function cargaPrecios(Request $request, $id){

        if ($request -> ajax()) {
            $precios = DB::table('detalle_producto as det')
                ->select('det.precio_unidad')
                    ->where('det.idProducto',$id)
                        ->orderBy('det.precio_unidad')
                        ->get();

            $data = json_encode($precios);

            return $data;
        }

    }


    //FUNCION PARA ALMACENAR EL PRODUCTO AL INVENTARIO DE LA SUCURSAL
    public function saveProductos(Request $request){

        $date = Carbon::now()->setTimezone('America/Guatemala');
        $dy = $date->day;
        $mes = $request->get("mes_db");
        $anio = $request->get("anio");
        $fecha = $anio."-".$mes."-".$dy;

        $idProd = $request->get("id_producto");              
        $cantidad = $request->get("cantidad");
        //$precio = $request->get("precio");
        $sub_total = $request->get("sub_total");  

        /*var_dump($dy);
        var_dump($mes);
        var_dump($anio);
        var_dump($fecha);*/

        if ($request -> ajax()) {
         

            for ($i=0; $i <sizeof($idProd) ; $i++) {
            
                try {

                    $newObject = new DetalleInventarioSucursal();
                    $newObject->idInventarioSucursal  = $request->get("id_inv_sucursal");
                    $newObject->idProducto = $idProd[$i];                
                    $newObject->mes = $request->get("mes_db");
                    $newObject->anio = $request->get("anio");
                    $newObject->fecha = $fecha;                            
                    $newObject->cantidad_total = $cantidad[$i];
                    $newObject->subtotal_inventario = $sub_total[$i];
                    $newObject->save();                
                                          
                } catch (Exception $e) {
                     $returnData = array(
                        'status' => 500,
                        'message' => $e->getMessage()
                    );
                    
                    return response()->json(['notification' => 'warning', 'data' => $returnData]);
                }//end try catch 

            }    
            
            return response()->json(['notification' => 'success', 'data' => 1]);
                                      
                           
        }//end request ajax

    }

}
