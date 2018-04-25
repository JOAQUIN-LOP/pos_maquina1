<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Validator;
use App\Factura;
use Illuminate\Support\Facades\DB;


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
            ->join('inventario as inv', 'emp.idEmpresa','=','inv.idEmpresa')
                ->select('emp.idEmpresa','emp.nom_empresa', 'suc.idSucursal', 'suc.nom_sucursal')
                    ->where('inv.estado','=',1, 'and', 'suc.estado','=',1)
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
            DB::connection()->enableQueryLog();

            $head = DB::table('facturas as fac')
            ->join('empresa as emp', )


            $detalles = DB::table('factura as fac')
            ->join('sucursal as suc', 'suc.idSucursal','=','fac.idSucursal') 
                ->join('usuario as us', 'us.idUsuario','=','fac.idUsuario')
                    ->select('fac.idFactura','fac.num_factura','suc.nom_sucursal', 'us.nom_usuario', 'fac.fecha','fac.total_factura')
                        ->where('fac.idSucursal',$id)
                        ->where('fac.mes',$request->input('mes'))
                        ->where('fac.anio','=', $request->input('anio'))                            
                            ->orderBy('fac.num_factura')
                                ->get();


            //var_dump(DB::getQueryLog());

            return view('detalle_factura', compact('facturas'));
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
}
