<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Validator;
use App\Factura;
USE App\DetalleFactura;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas = DB::table('sucursal as suc')
        ->join('empresa as emp', 'suc.idEmpresa','=','emp.idEmpresa')            
                ->select('emp.idEmpresa','emp.nom_empresa', 'suc.idSucursal', 'suc.nom_sucursal')
                    ->where('suc.estado','=',1)
                        ->groupBy('suc.nom_sucursal')
                            ->orderBy('suc.nom_sucursal')
                                ->get();
        
        return view('factura', compact('facturas', $facturas));
    }

    //ver todos las facturas
    //POST
    public function see(Request $request, $id){

        if ($request -> ajax()) {            
            DB::connection()->enableQueryLog();

            $facturas = DB::table('factura as fac')
            ->join('sucursal as suc', 'suc.idSucursal','=','fac.idSucursal') 
                ->join('usuario as us', 'us.idUsuario','=','fac.idUsuario')
                    ->select('fac.idFactura','fac.num_factura','suc.nom_sucursal', 'us.nom_usuario', 'fac.fecha','fac.total_factura')
                        ->where('fac.idSucursal',$id)
                        ->where('fac.mes',$request->input('mes'))
                        ->where('fac.anio','=', $request->input('anio'))                            
                            ->orderBy('fac.num_factura')
                                ->get();


            //var_dump(DB::getQueryLog());

            return view('datos_factura', compact('facturas'));
        }        

    }

    //ver el detalle de la factura
    //POST
    public function detalles(Request $request, $id){

         if ($request -> ajax()) {            
            
            $cabecera = DB::table('factura as fac')
            ->join('empresa as emp', 'emp.idEmpresa','=','fac.idEmpresa' )
                ->join('sucursal as suc', 'suc.idSucursal','=','fac.idSucursal')
                    ->select('emp.nom_empresa', 'suc.nom_sucursal', 'fac.num_factura', 'fac.fecha','fac.idFactura')
                        ->where('fac.idFactura', $id)
                            ->get();

            
            $detalles = DB::table('detalle_factura as det')
            ->join('producto as prod', 'det.idProducto','=','prod.id') 
                ->select('det.idProducto','prod.nomProducto','det.cantidad', 'det.precio_unit', 'det.total_venta')
                        ->where('det.idFactura',$id)                        
                            ->orderBy('prod.nomProducto')
                                ->get();


             $cantidades = DB::table('detalle_factura as det')                            
                        ->select(DB::raw("SUM(det.cantidad) as cantidad"), DB::raw("SUM(det.total_venta) as total"))
                            ->where('det.idFactura',$id)                      
                                ->get();
            

            return view('detalle_factura', compact('cabecera','detalles', 'cantidades'));
        }       

    }

    public function formFactura(){

        $facturas = DB::table('sucursal as suc')
        ->join('empresa as emp', 'suc.idEmpresa','=','emp.idEmpresa')
            ->join('inventario as inv', 'emp.idEmpresa','=','inv.idEmpresa')
                ->select('emp.idEmpresa','emp.nom_empresa', 'suc.idSucursal', 'suc.nom_sucursal', 'inv.mes', 'inv.anio')
                    ->where('suc.estado',1)                    
                        ->groupBy('suc.nom_sucursal')
                            ->orderBy('suc.nom_sucursal')
                                ->get();

        $date = Carbon::now()->setTimezone('America/Guatemala');
        $mt = $date->month;
        $yr = $date->year;
        $date2 = $date->toDateString();
        $date = $date->format('d-m-Y');
        

        return view('crear_factura', compact('facturas', 'date', 'date2' , 'mt'));
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


    /*POST*/
    public function cargaFactura(Request $request, $id){


        if ($request -> ajax()) {            
            $num_factura =   DB::table('factura as fact')
                ->join('sucursal as suc', 'suc.idSucursal','=','fact.idSucursal')            
                    ->select(DB::raw("COUNT(fact.idFactura) as numero"))
                        ->where('suc.idSucursal',$id)                        
                            ->get();

            $productos = DB::table('detalle_producto as det')
                ->join('producto as prod', 'det.idProducto','=','prod.id')            
                    ->select("det.idProducto", "prod.nomProducto")
                        ->groupBy('prod.nomProducto')
                            ->orderBy('prod.nomProducto')
                            ->get();

       
            $numero = $num_factura[0]->numero + 1;

            return view('nueva_factura', compact('numero', 'productos'));
        }
        
    }

    public function cargaPrecios(Request $request, $id){

        if ($request -> ajax()) {
            $precios = DB::table('detalle_producto as det')
                ->select('det.precio_unidad')
                    ->where('det.idProducto',$id)
                    ->where('det.estado',1)
                        ->orderBy('det.precio_unidad')
                        ->get();

            $data = json_encode($precios);

            return $data;
        }

    }

    public function saveFactura(Request $request)
    {
        $date = Carbon::now()->setTimezone('America/Guatemala');
        $dy = $date->day;
        $mes = $request->get("mes_db");
        $anio = $request->get("anio_db");
        $fecha = $anio."-".$mes."-".$dy;
        /*var_dump($dy);
        var_dump($mes);
        var_dump($anio);
        var_dump($fecha);*/

        if ($request -> ajax()) {

            try {
            
                $newObject = new Factura();
                $newObject->num_factura  = $request->get("no_factura");
                $newObject->idEmpresa = $request->get("id_empresa");
                $newObject->idSucursal = $request->get("nom_sucursal");
                $newObject->idUsuario = 1;
                $newObject->dia = $dy;
                $newObject->mes = $request->get("mes_db");
                $newObject->anio = $request->get("anio_db");
                $newObject->fecha = $fecha;
                $newObject->hora = $date;
                $newObject->direccion = "ciudad";
                $newObject->total_factura = 0;
                $newObject->estado = 1;
                
                if ($newObject->save()) {

                    $idFact = $newObject->idFactura;                    
                    $idProd = $request->get("id_producto");
                    $cantidad = $request->get("cantidad");
                    $precio = $request->get("precio");
                    $sub_total = $request->get("sub_total");                    

                    for ($i=0; $i <sizeof($idProd) ; $i++) {
                    
                        $factDetalle = new DetalleFactura();
                        $factDetalle->idFactura = $idFact;
                        $factDetalle->idProducto = $idProd[$i];
                        $factDetalle->cantidad = $cantidad[$i];
                        $factDetalle->precio_unit = $precio[$i];
                        $factDetalle->total_venta = $sub_total[$i];
                        $factDetalle->save();
                    }                        

                    return response()->json(['notification' => 'success', 'producto' => $newObject->idFactura]);
                }else{
                    return false;
                }
                            

            } catch (Exception $e) {
                 $returnData = array(
                    'status' => 500,
                    'message' => $e->getMessage()
                );
                
                return response()->json(['notification' => 'warning', 'data' => $returnData]);
            }//end try catch            
        }//end request ajax
    }


    //ver el detalle de la factura para el reporte
    //POST
    public function detalleReporte($id){    
            
            $cabecera = DB::table('factura as fac')
            ->join('empresa as emp', 'emp.idEmpresa','=','fac.idEmpresa' )
                ->join('sucursal as suc', 'suc.idSucursal','=','fac.idSucursal')
                    ->select('emp.nom_empresa', 'suc.nom_sucursal', 'fac.num_factura', 'fac.fecha')
                        ->where('fac.idFactura', $id)
                            ->get();

            
            $detalles = DB::table('detalle_factura as det')
            ->join('producto as prod', 'det.idProducto','=','prod.id') 
                ->select('det.idProducto','prod.nomProducto','det.cantidad', 'det.precio_unit', 'det.total_venta')
                        ->where('det.idFactura',$id)                        
                            ->orderBy('prod.nomProducto')
                                ->get();


             $cantidades = DB::table('detalle_factura as det')                            
                        ->select(DB::raw("SUM(det.cantidad) as cantidad"), DB::raw("SUM(det.total_venta) as total"))
                            ->where('det.idFactura',$id)                      
                                ->get();
            
            $result["cabecera"] = $cabecera;
            $result["detalles"] = $detalles;
            $result["cantidades"] = $cantidades;        
            return response()->json($result);            
        }       


}
