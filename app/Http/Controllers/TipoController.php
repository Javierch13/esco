<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoOrden;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipos = TipoOrden::AllTipos();

       return view('tipos.tipos_view',compact('tipos'));
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
        $tipo = new TipoOrden;
        $tipo->nombre = $request['nombre'];
        $tipo->save();

      return response()->json(['status' => 200,'data' => $tipo]); 
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
    public function edit(TipoOrden $tipo)
    {
        //
        return response()->json(['status' => 200,'data' => $tipo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoOrden $tipo)
    {
        //
       $tipo->nombre = $request['nombre'];
       $tipo->update();

      return response()->json(['status' => 200,'data' => $tipo]);
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
        TipoOrden::find($id)->delete();
      
        return response()->json(['status'=>200]);
    }
}
