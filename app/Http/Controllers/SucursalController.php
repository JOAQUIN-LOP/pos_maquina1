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


class SucursalController extends Controller
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
        
            return view('inventario_sucursal', compact('sucursal'));    
        
        }else{
            return view('sin_contenido');
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

    public function verNumero(Request $request, $id){        

        if($request -> ajax()){

            $numero = DB::table('inventario_sucursal')        
            ->select(DB::raw('COUNT(idInventarioSucursal) as numero_inv'))
                ->where('idSucursal',$id)                            
                ->where('anio', $request->input('anio'))
                    ->get();            

            //var_dump(count($numero));

            //var_dump($numero[0]->numero_inv);

            $mes = $numero[0]->numero_inv + 1;

            //var_dump($mes);
            if ($mes > 0 && $mes < 13) {

                $data = json_encode($mes);

                return $data;        
            }

            else{
                return view('already');
            }         
        }        
    }

    public function listarInventario(Request $request, $id){

        if ($request -> ajax()) {
            $lista = DB::table('inventario_sucursal')        
            //->select())
                ->where('idSucursal',$id)                            
                ->where('anio', $request->input('anio'))
                    ->get();
        }

    }

    public function listaAll(Request $request, $id){

        if ($request -> ajax()) {
            $lista = DB::table('inventario_sucursal')        
            ->select('idInventarioSucursal', 'num_inventario_sucursal', 'idSucursal', 'mes', 'anio', 'fecha','total_cantidad_productos', 'total_cantidad_inventario', 'estado')
                ->where('idSucursal',$id)                            
                ->where('anio', $request->input('anio'))
                    ->get();


            return view('lista_inventario');
        }
    }


    // LISTADO PARA LA VISUALIZACION DE TODOS LOS INVENTARIOS SEGUN LA SUCURSAL
    public function listaTodo(Request $request, $id){
        
        if ($request -> ajax()) {
            $listado = DB::table('inventario_sucursal as inv')      
            ->join('sucursal as suc', 'inv.idSucursal','=','suc.idSucursal')
            ->select('inv.idInventarioSucursal', 'inv.num_inventario_sucursal', 'inv.idSucursal','suc.nom_sucursal', 'inv.mes', 'inv.anio', 'inv.fecha','inv.total_cantidad_productos', 'inv.total_cantidad_inventario', 'inv.estado')
                ->where('inv.idSucursal',$id)                            
                ->where('inv.anio', $request->input('anio'))
                    ->get();
    

            if (count($listado) > 0) {
            
                return view('carga_listado', compact('listado'));
            
            }else{
           
                return view('sin_contenido');
           
            }    
        }                
    
    }



    public function listaInventarios(){

        $sucursal = DB::table('sucursal as suc')
        ->join('empresa as emp', 'suc.idEmpresa','=','emp.idEmpresa')            
                ->select('emp.idEmpresa','emp.nom_empresa', 'suc.idSucursal', 'suc.nom_sucursal')
                    ->where('suc.estado','=',1)
                        ->groupBy('suc.nom_sucursal')
                            ->orderBy('suc.nom_sucursal')
                                ->get();

        if (count($sucursal) > 0) {
        
            return view('listado_sucursal', compact('sucursal'));
        
        }else{
            return view('sin_contenido');
        }
    }

    //VER DETALLE DE INVENTARIO SUCURSAL
    public function verDetalleInventario(Request $request, $id,$suc){

        if($request -> ajax()){

            $sucursal = DB::table('sucursal')
            ->select('nom_sucursal')
                ->where('idSucursal', $suc)
                ->get();

            $suma = DB::table('detalle_inventario_sucursal')
            ->select(DB::raw("SUM(cantidad_total) as cantidad"), DB::raw("SUM(subtotal_inventario) as total"))
                ->where('idInventarioSucursal', $id)
                ->get();

            $detalles = DB::table('detalle_inventario_sucursal as det')
            ->join('producto as prod', 'det.idProducto','=','prod.id')
            ->select('prod.nomProducto', 'prod.descripcion_producto', 'det.fecha','det.cantidad_total', 'det.subtotal_inventario')
                ->where('det.idInventarioSucursal',$id)
                    ->groupBy('prod.nomProducto')
                        ->get();
    

            if (count($detalles) > 0) {
            
                return view('detalle_inv_sucursal', compact('detalles', 'suma', 'sucursal'));
            
            }else{
           
                return view('sin_contenido');
           
            }     
        }
        
    }



    //FUNCION PARA GUARDAR EL INVENTARIO
    //SE VERIFICA QUE NO EXISTA INVENTARIO ABIERTO PARA LA SUCURSAL BAJO NINGUN AñO
    public function saveInventarioSuc(Request $request, $id){

        if ($request -> ajax()) {
            $activo = DB::table('inventario_sucursal')
                ->select('idInventarioSucursal')
                    ->where('idSucursal', $id)
                    ->where('estado', 1)
                        ->count();

            
            if($activo > 0){
                $activo = 1;
                return $activo;
            }

            $date = Carbon::now()->setTimezone('America/Guatemala');
            $dy = $date->day;
            $mes = $request->get("no_inventario");
            $anio = $request->get("anio");
            $fecha = $anio."-".$mes."-".$dy;                     
            
            try{

                $newObject = new InvSucursal();
                $newObject->num_inventario_sucursal  = $request->get("no_inventario");                
                $newObject->idSucursal = $request->get("nom_sucursal");            
                $newObject->mes = $mes;       
                $newObject->anio = $anio;     
                $newObject->fecha = $fecha;                
                $newObject->total_cantidad_productos = 0;
                $newObject->total_cantidad_inventario = 0;                
                $newObject->estado = 1;
                $newObject->save();

                return response()->json(['notification' => 'success', 'inventaio' => $newObject->idInventarioSucursal]);

            }catch(Exception $e){
                $returnData = array(
                    'status' => 500,
                    'kmessage' => $e->getMessage()
                );

                return response()->json(['notification' => 'warning', 'data' => $returnData]);
            }//end tray catch

        }//end request ajax
    }

    public function listarActivos(Request $request, $id){

        if ($request -> ajax()) {
            $listado = DB::table('inventario_sucursal as inv')      
            ->join('sucursal as suc', 'inv.idSucursal','=','suc.idSucursal')
            ->select('inv.idInventarioSucursal', 'inv.num_inventario_sucursal', 'inv.idSucursal','suc.nom_sucursal', 'inv.mes', 'inv.anio', 'inv.fecha','inv.total_cantidad_productos', 'inv.total_cantidad_inventario', 'inv.estado')
                ->where('inv.idSucursal',$id)                            
                ->where('inv.anio', $request->input('anio'))
                    ->get();
    

            if (count($listado) > 0) {
            
                return view('carga_listado_iniciar', compact('listado'));
            
            }else{
           
                return view('sin_contenido');
           
            }    
        }

    }

    public function cerrarInventario(Request $request, $id){
        
        if ($request -> ajax()) {
            
            $data =  DB::table('inventario_sucursal')->where('idInventarioSucursal',$id)->update(array('estado'=>0));

            return 1;
        }
    }

}
