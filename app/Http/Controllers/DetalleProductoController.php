<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use Response;
use Validator;
use App\DetalleProducto;
use Carbon\Carbon;

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
                $newObject = new DetalleProducto();
                $newObject->idProducto = $request->get('IdProducto');
                $newObject->mes = $request->get('mesDetalle');
                $newObject->anio = $request->get('AnioDetalle');
                $newObject->fecha = Carbon::now()->toDateString();
                $newObject->precio_total_compras = $request->get('precio_total_compras');
                $newObject->cantidad_unidades = $request->get('cantidad_unidades');
                $newObject->precio_unidad = $request->get('precio_unidad');
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
        $objectUpdate = DetalleProducto::find($id);
        if ($objectUpdate) {
            try {
                $objectUpdate->idProducto = $request->get('IdProducto');
                $objectUpdate->mes = $request->get('mesDetalle');
                $objectUpdate->anio = $request->get('AnioDetalle');
                $objectUpdate->fecha = Carbon::now()->toDateString();
                $objectUpdate->precio_total_compras = $request->get('precio_total_compras');
                $objectUpdate->cantidad_unidades = $request->get('cantidad_unidades');
                $objectUpdate->precio_unidad = $request->get('precio_unidad');
                $objectUpdate->save();
                return Response::json($objectUpdate, 200);
            }
            catch (Exception $e) {
                $returnData = array(
                    'status' => 500,
                    'message' => $e->getMessage()
                );
                return Response::json($returnData, 500);
            }
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
