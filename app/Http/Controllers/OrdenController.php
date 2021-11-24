<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrdenTrab;
use App\TipoOrden;

class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ordenes = OrdenTrab::AllOrdenes();

        //dd($ordenes);
        return view('ordenes.ordenes_view',compact('ordenes'));
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

        $orden = new OrdenTrab;
        $orden->fecha_creacion = date('d/m/y');
        $orden->fecha_asignacion = date('d/m/y');
        $orden->fecha_ejecucion = $request['fecha_ejecucion'];
        $orden->id_tipo = $request['id_tipo'];
        $orden->id_operador = $request['id_operador'];
        $orden->save();

      return response()->json(['status' => 200,'data' => $orden]); 
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
    public function edit(OrdenTrab $orden)
    {
        //
        return response()->json(['status' => 200,'data' => $orden]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrdenTrab $orden)
    {
        //
        $orden->fecha_asignacion = date('d/m/y');
        $orden->fecha_ejecucion = $request['fecha_ejecucion'];
        $orden->id_tipo = $request['id_tipo'];
        $orden->id_operador = $request['id_operador'];
        $orden->resultado = $request['resultado'];
        $orden->valor = $request['valor'];
        $orden->update();

      return response()->json(['status' => 200,'data' => $orden]); 
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
        OrdenTrab::find($id)->delete();
      
        return response()->json(['status'=>200]);
    }
}
