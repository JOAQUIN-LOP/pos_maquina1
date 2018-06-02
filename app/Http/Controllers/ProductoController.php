<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
use Validator;
use App\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $producto = Producto::orderBy('nomProducto', 'asc')->get();
        $producto = DB::table('producto')
        ->orderByRaw('estado DESC, nomProducto ASC')
        ->get();
        return response()->json(
            $producto->toArray()
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulos');
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
                '_token' => 'required',
                'nomProducto' => 'required',
                'descripcion_producto' => 'required',
            
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
                    $newObject = new Producto();
                    $newObject->tipo_id = 1;
                    $newObject->codProducto = 0;
                    $newObject->nomProducto = $request->get('nomProducto');
                    $newObject->descripcion_producto = $request->get('descripcion_producto');
                    $newObject->save();
                    
                    return response()->json(['notification' => 'success', 'producto' => $newObject->nomProducto]); 
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
        $producto = DB::table('producto')
        ->where('estado', 1)
        ->orderBy('nomProducto', 'ASC')
        ->get();

        return response()->json(
            $producto->toArray()
        );
    }

    public function viewList(){
        return view('ListArticulos');
    }

    public function list($id)
    {
        $producto = DB::table('producto as Prod')
        ->join('detalle_producto as DP','Prod.id','=','DP.idProducto')
        ->select('Prod.nomProducto as nomProducto' , 'Prod.descripcion_producto as descripcion_producto', 'Prod.estado as estado', 'DP.cantidad_unidades as cantidad_unidades', 'DP.precio_total_compras as precio_total_compras')
        ->selectRaw("DATE_FORMAT(DP.fecha,'%d-%m-%Y') as fecha")
        ->where('Prod.estado', 1)
        ->orderBy('Prod.nomProducto', 'asc')
        ->get();

        return response()->json(
            $producto->toArray()
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('data_products');
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
        if($request->ajax()){
            $update = Producto::find($id);
            if ($update) {
                try {
                    $update->nomProducto = $request->get('nomProducto');
                    $update->descripcion_producto = $request->get('descripcion_producto');
                    $update->save();
                    return response()->json(['notification' => 'success', 'producto' => $update->nomProducto]); 
                }
                catch (\Illuminate\Database\QueryException $e) {
                    $returnData = array(
                        'status' => 500,
                        'message' => $e->getMessage()
                    );
                    return response()->json(['notification' => 'warning', 'data' => $returnData]); 
                }
            }
            else {
                $returnData = array(
                    'status' => 404,
                    'message' => 'Not found'
                );
                    return response()->json(['notification' => 'danger', 'data' => $returnData]); 
            }    
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objectDelete = Producto::find($id);
        if ($objectDelete) {
            try {
                $objectDelete->estado = '0';
                $objectDelete->save();
                return response()->json(['notification' => 'success', 'producto' => $objectDelete->nomProducto]); 
            }
            catch (\Illuminate\Database\QueryException $e) {
                $returnData = array(
                    'status' => 500,
                    'message' => $e->getMessage()
                );
                return response()->json(['notification' => 'warning', 'data' => $returnData]); 
            }
        }
        else {
            $returnData = array(
                'status' => 404,
                'message' => 'Not found'
            );
                return response()->json(['notification' => 'danger', 'data' => $returnData]); 
        }    
    }    


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        $objectDelete = Producto::find($id);
        if ($objectDelete) {
            try {
                $objectDelete->estado = '1';
                $objectDelete->save();
                return response()->json(['notification' => 'success', 'producto' => $objectDelete->nomProducto]); 
            }
            catch (\Illuminate\Database\QueryException $e) {
                $returnData = array(
                    'status' => 500,
                    'message' => $e->getMessage()
                );
                return response()->json(['notification' => 'warning', 'data' => $returnData]); 
            }
        }
        else {
            $returnData = array(
                'status' => 404,
                'message' => 'Not found'
            );
                return response()->json(['notification' => 'danger', 'data' => $returnData]); 
        }    
    }    

    public function Agregar()
    {
        // $producto = Producto::orderBy('nomProducto', 'asc')->get();
        $producto = DB::table('detalle_producto as DP')
        ->join('producto as P','P.id','=','DP.idProducto')
        ->select('P.nomProducto', 'P.id')
        ->where('P.estado', 1)
        ->where('DP.cantidad_unidades', '>=', 1)
        ->orderByRaw('P.nomProducto ASC')
        ->groupBy('P.nomProducto')
        ->get();
        return response()->json(
            $producto->toArray()
        );
    }
}
