<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $producto = Producto::all();
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
                return response()->json(['notification' => 'warning', 'data' => $returnData]); 
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
                catch(Exception $e) {
                    $returnData = array(
                        'status' => 500,
                        'message' => $e->getMessage()
                    );
                    return response()->json(['notification' => 'danger', 'data' => $returnData]); 
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
            $update->nomProducto = $request->get('nomProducto');
            $update->descripcion_producto = $request->get('descripcion_producto');
            $update->save();
            
            return response()->json(['notification' => 'success', 'producto' => $update->nomProducto]); 
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
        //
    }    
}
