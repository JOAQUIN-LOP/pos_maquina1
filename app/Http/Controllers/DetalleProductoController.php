<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use Response;
use Validator;
use App\DetalleProducto;

class DetalleProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $producto = Producto::all();
        $detalleproducto = DetalleProducto::with('producto')->get();

        // dump($detalleproducto);exit();
        if ($producto) {
            return view('DetalleArticulos', compact('producto', 'detalleproducto'));
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
            'IdProducto' => 'required',
            'mesDetalle' => 'required',
            'AnioDetalle' => 'required',
            'precio_total_compras' => 'required',
            'cantidad_unidades' => 'required',
            'precio_unidad' => 'required',
           
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
                dump($request);exit();
                $newObject = new Producto();
                $newObject->idProducto = 1;
                $newObject->mes = 0;
                $newObject->anio = 0;
                $newObject->fecha = 0;
                $newObject->precio_total_compras = 0;
                $newObject->cantidad_unidades = $request->get('nomProducto');
                $newObject->precio_unidad = $request->get('descripcion_producto');
                $newObject->save();
                return redirect('home/detalle/precio');
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
}
