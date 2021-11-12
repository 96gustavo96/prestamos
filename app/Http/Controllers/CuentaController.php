<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Cuenta;
use  App\Models\Cliente;
use  App\Models\pago;
use Illuminate\Support\Facades\DB;

class CuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Busqueda=$request->get('Buscar');
        $cuentas= DB::table('cuentas')
                    ->select('id','cliente_id','Articulo','F_Pago','C_Pagos','Cuotas','F_Inicio','F_Vencimiento','Observaciones')
                    ->where('cliente_id','LIKE','%'.$Busqueda.'%')
                    ->orderby('id','desc')
                    ->paginate(10);
        return view('cuentas.index',compact('cuentas','Busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cuentas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cuenta = new Cuenta();
        $cuenta->cliente_id=$request->input('cliente_id');
        $cuenta->Articulo=$request->input('Articulo');
        $cuenta->F_Pago=$request->input('F_Pago');
        $cuenta->C_Pagos=$request->input('C_Pagos');
        $cuenta->Cuotas=$request->input('Cuotas');
        $cuenta->F_Inicio=$request->input('F_Inicio');
        $cuenta->F_Vencimiento=$request->input('F_Vencimiento');
        $cuenta->Observaciones=$request->input('Observaciones');
        $cuenta->save();

        $conexion=mysqli_connect('localhost','root','','prestamos');

        $cpagos="SELECT * FROM cuentas order by id desc limit 1";
        $rpagos=mysqli_query($conexion,$cpagos);
        $filap = $rpagos ->fetch_assoc();
        $id_cuenta= $filap['id'];

        $pago = new pago();
        $pago->cuenta_id=$id_cuenta;
        $pago->Monto=$request->input('Cuotas');
        $pago->F_Pago=$request->input('F_Inicio');
        $pago->Detalles=$request->input('Observaciones');
        $pago->Situacion=$request->input('Situacion');
        $pago->N_Cuota=$request->input('N_Cuota');
        $pago->save();


        return redirect()->route('cuentas.index'); 

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
