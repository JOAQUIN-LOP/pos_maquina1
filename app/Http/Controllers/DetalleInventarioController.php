<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetalleInventario;
use Response;
use Validator;
use DB;
use Carbon\Carbon;

class DetalleInventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('DetalleInventario');
    }

    public function VerInventarioActivo()
    {
        $data = DB::table('inventario As Inv')
        ->join('empresa As Emp', 'Inv.idEmpresa', '=', 'Emp.idEmpresa')
        ->select('Emp.nom_empresa as empresa', 'Inv.idInventario as idInventario', 'Inv.anio as anio','Inv.mes as mes', 'Inv.num_inventario')
        ->where('Inv.estado', 1)
        ->get();
        return Response::json($data); 

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

        if($request->ajax()){
            
            $validator = Validator::make($request->all(), [
                'idInventario' => 'required',
                'idProducto' => 'required',
                'mes' => 'required',
                'anio' => 'required',
                'SubTotal' => 'required',
                'cantidadT' => 'required'
            ]);
            
            if ($validator->fails()) {
                $returnData = array(
                    'status' => 400,
                    'message' => 'Invalid Parameters',
                    'validator' => $validator->messages()->toJson()
                );
            return response()->json(['notification' => 'danger', 'data' => $returnData]); 
            } else {
                try {
                    $newObject = new DetalleInventario();
                    $newObject->idProducto = $request->get('idProducto');
                    $newObject->mes = $request->get('mes');
                    $newObject->anio = $request->get('anio');
                    $newObject->fecha = Carbon::now()->toDateString();
                    $newObject->idInventario = $request->get('idInventario');
                    $newObject->subtotal_inventario = $request->get('SubTotal');
                    $newObject->cant_total = $request->get('cantidadT');
                    $newObject->save();
            return response()->json(['notification' => 'success', 'producto' => $newObject->idProducto]); 
                }
                catch(Exception $e) {
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
        $data = DB::table('detalle_inventario As Dti')
        ->join('producto As Prod', 'Dti.idProducto', '=', 'Prod.id')
        ->select('Prod.nomProducto as producto', 'Dti.idProducto as idPro','Dti.mes as mes', 'Dti.anio as anio',  DB::raw('sum(Dti.cant_total)  as cant'),  DB::raw('sum(Dti.subtotal_inventario)  as sub'))
        ->where('Dti.idInventario', $id)
        ->groupBy('Prod.nomProducto')
        ->get();
        return response()->json(
            $data->toArray()
        );
    }


    public function showDetalleProducto($id, $prod)
    {
        $data = DB::table('detalle_inventario As Dti')
        ->join('producto As Prod', 'Dti.idProducto', '=', 'Prod.id')
        ->select('Prod.nomProducto as producto', 'Dti.idProducto as idPro','Dti.mes as mes', 'Dti.anio as anio',  'Dti.cant_total  as cant',  'Dti.subtotal_inventario  as sub','Dti.id_detalle_inventario')
        ->where('Dti.idInventario', $id)
        ->where('Dti.idProducto', $prod)
        ->get();
        return response()->json(
            $data->toArray()
        );
    }

    public function EditCantidad(Request $request){

        $data =  DB::table('detalle_inventario')->where('id_detalle_inventario',$request->get('id'))->update(array('cant_total'=>$request->get('NuevaCant'), 'subtotal_inventario' => $request->get('Total')));
        return response()->json(['notification' => 'success', 'producto' => $data]); 

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

    }
