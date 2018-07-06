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
                ->select(DB::raw("num_inventario_sucursal"))
                    ->where('idSucursal',$id)                        
                        ->get();

            $productos = DB::table('detalle_producto as det')
                ->join('producto as prod', 'det.idProducto','=','prod.id')            
                    ->select("det.idProducto", "prod.nomProducto")
                        ->groupBy('prod.nomProducto')
                            ->orderBy('prod.nomProducto')
                            ->get();

       
            $numero = $num_factura[0]->num_inventario_sucursal;

            return view('precio_detalle_inventario', compact('numero', 'productos'));
        }
        
    }



}
