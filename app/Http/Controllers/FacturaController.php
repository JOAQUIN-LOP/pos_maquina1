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
                ->select('emp.nom_empresa', 'suc.idSucursal', 'suc.nom_sucursal')
                    ->where('inv.estado','=',1, 'and', 'suc.estado','=',1)
                        ->groupBy('suc.nom_sucursal')
                            ->orderBy('suc.nom_sucursal')
                                ->get();



        return view('factura', compact('facturas', $facturas));
    }

    //ver todos los productos
    public function see(Request $request){

        return response()->json($facturas->toArray());

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
