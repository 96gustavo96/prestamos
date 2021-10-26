<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Busqueda=$request->get('Buscar');
        $clientes= DB::table('clientes')
                    ->select('id','DNI','Nombre_y_Apellido','Nacimiento','Domicilio','Barrio','Localidad','Rubro','Telefono')
                    ->where('DNI','LIKE','%'.$Busqueda.'%')
                    ->orwhere('id','LIKE','%'.$Busqueda.'%')
                    ->orwhere('Nombre_y_Apellido','LIKE','%'.$Busqueda.'%')
                    ->orderby('id','asc')
                    ->paginate(10);
        return view('clientes.index',compact('clientes','Busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->DNI=$request->input('DNI');
        $cliente->Nombre_y_Apellido=$request->input('Nombre_y_Apellido');
        $cliente->Nacimiento=$request->input('Nacimiento');
        $cliente->Domicilio=$request->input('Domicilio');
        $cliente->Barrio=$request->input('Barrio');
        $cliente->Localidad=$request->input('Localidad');
        $cliente->Rubro=$request->input('Rubro');
        $cliente->Telefono=$request->input('Telefono');
        $cliente->save();
        return redirect()->route('clientes.index'); 
        
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
