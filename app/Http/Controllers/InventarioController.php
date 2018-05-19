<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
use Validator;
use App\Inventario;
use Carbon\Carbon;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $inventario = Inventario::with('empresa')->get();
        return response()->json(
            $inventario->toArray()
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = DB::table('inventario as inv')
        ->select('estado')
        ->where('estado', 1)
        ->get();
        
        $data2 = DB::table('inventario as inv')
        ->select('estado')
        ->where('mes', $request->get('mes'))
        ->where('anio', $request->get('anio'))
        ->get();
        
        if(count($data)>=1){
            return response()->json(['notification' => 'warning', 'data' => "Se Encuentra un Inventario Activo"]); 
        }
        elseif(count($data2)>=1) {
            return response()->json(['notification' => 'warning', 'data' => "no se puede duplicar inventario"]); 
        }else{
            
            $validator = Validator::make($request->all(), [
                '_token' => 'required',
                'idInventario' => 'required',
                'empresa' => 'required',
                'mes' => 'required',
                'anio' => 'required',
            ]);
            
            if ($validator->fails()) {
                $returnData = array(
                    'status' => 400,
                    'message' => 'Parametros Invalidos',
                    'validator' => $validator->messages()->toJson()
                );
                return response()->json(['notification' => 'danger', 'data' => $returnData]); 
            } else {
                try {
                    $newObject = new Inventario();
                    $newObject->num_inventario = $request->get('idInventario');
                    $newObject->idEmpresa = $request->get('empresa');;
                    $newObject->mes = $request->get('mes');
                    $newObject->anio = $request->get('anio');
                    $newObject->fecha =  Carbon::now()->toDateString();
                    $newObject->total_cantidad_productos = 0;
                    $newObject->total_cantidad_inventario = 0;
                    $newObject->save();

                    return response()->json(['notification' => 'success', 'data' => $newObject->num_inventario]); 
                }
                catch (\Illuminate\Database\QueryException $e) {
                    $returnData = array(
                        'status' => 500,
                        'message' => $e->getMessage()
                    );
                    return response()->json(['notification' => 'warning', 'data' => $returnData]); 
                }
            }


        
        }
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

    public function All($anio)
    {
        
        $inventario = Inventario::with('empresa')->where('anio',$anio)->get();
        return response()->json(
            $inventario->toArray()
        );
    }

    public function FinalizarInventario($id)
    {
               
       $data =  DB::table('inventario')->where('num_inventario',$id)->update(array('estado'=>0));

       return response()->json(['notification' => 'success', 'producto' => $data]); 

    }

         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contar($anio)
    {
        $data = DB::table('inventario as inv')
        ->select(DB::raw('sum(inv.idInventario + 1) as cantidad'))
        ->where('estado','1')
        ->where('anio',$anio)
        ->get();
        return response()->json(
            $data->toArray()
        );
    }

    public function verInventario(){
        return view('Inventarios');   
    }

    public function PDF($id){

        $inventario = Inventario::with('empresa')->where('idInventario',$id)->get();

        $detalle = DB::table('detalle_inventario As Dti')
        ->join('producto As Prod', 'Dti.idProducto', '=', 'Prod.id')
        ->select('Prod.nomProducto as producto','Dti.mes as mes', 'Dti.anio as anio',  DB::raw('sum(Dti.cant_total)  as cant'),  DB::raw('sum(Dti.subtotal_inventario)  as sub'),'Dti.id_detalle_inventario')
        ->where('Dti.idInventario', $id)
        ->groupBy('Prod.nomProducto')
        ->groupBy('Dti.idInventario')
        ->get();

        return response()->json([
            $inventario->toArray(), $detalle->toArray()
        ]
        );
    }

}
