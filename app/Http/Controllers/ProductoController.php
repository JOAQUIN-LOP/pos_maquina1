<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        if ($producto) {
            return view('articulos', compact('producto'));
        }
        else {
            $returnData = array(
                'status' => 404,
                'message' => 'Not found'
            );
            return Response::json($returnData, 404);
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
        

            $validator = Validator::make($request->all(), [
                'nomProducto' => 'required',
                'descripcion_producto' => 'required',
               
            ]);
            
            if ($validator->fails()) {
                $returnData = array(
                    'status' => 400,
                    'message' => 'Invalid Parameters',
                    'validator' => $validator->messages()->toJson()
                );
                return Response::json($returnData, 400);
            } else {
                try {
                    $newObject = new Producto();
                    $newObject->tipo_id = 1;
                    $newObject->codProducto = 0;
                    $newObject->nomProducto = $request->get('nomProducto');
                    $newObject->descripcion_producto = $request->get('descripcion_producto');
                    $newObject->save();
                    return redirect('home/producto');
                }
                catch(Exception $e) {
                    $returnData = array(
                        'status' => 500,
                        'message' => $e->getMessage()
                    );
                    return view('articulos', array(
                
                    ));
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
        $objectSee = Producto::find($id);
        if ($objectSee) {
            return Response::json($objectSee, 200);
        }
        else {
            $returnData = array(
                'status' => 404,
                'message' => 'Not found'
            );
            return Response::json($returnData, 404);
        }
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
