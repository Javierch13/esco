<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Operador;

class OperadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $operadores = Operador::AllOperators();
        
        return view('operadores.operadores_view',compact('operadores'));
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
        $operador = new Operador;
        $operador->nombre = $request['nombre'];
        $operador->save();

      return response()->json(['status' => 200,'data' => $operador]); 
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
    public function edit(Operador $operador)
    {
        //
        return response()->json(['status' => 200,'data' => $operador]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operador $operador)
    {
        //
       $operador->nombre = $request['nombre'];
       $operador->update();

      return response()->json(['status' => 200,'data' => $operador]);
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
        Operador::find($id)->delete();
      
      return response()->json(['status'=>200]);
    }
}
