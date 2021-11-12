<?php

namespace App\Http\Controllers;

use App\Models\pago;
use Illuminate\Http\Request;
use Carbon\Carbon;


use  App\Models\Cuenta;
use  App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Busqueda=$request->get('Buscar');

        $pagos= DB::table('pagos')
                    ->select('id','cuenta_id','Monto','F_Pago','Detalles','Situacion','N_Cuota')
                    ->where('cuenta_id','=',$Busqueda)
                    ->orderby('id','desc')
                    ->paginate(10);
        return view('pagos.index',compact('pagos','Busqueda'));
    }
    public function mostrar($id)
    {
        
        $actualizar = pago::findOrFail($id);
        $actualizar ->Situacion='Pagado';
        $actualizar->save();
        $pagos= DB::table('pagos')
                    ->select('id','cuenta_id','Monto','F_Pago','Detalles','Situacion','N_Cuota')
                    ->where('id','=',$id)
                    ->orderby('id','desc')
                    ->paginate(10);
        $Busqueda=$id;
        //return view('pagos.index',compact('pagos','Busqueda'));
        return redirect()->route('pagos.index');
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* $pagos= DB::table('pagos')
                    ->select('id','cuenta_id','Monto','F_Pago','Detalles','Situacion')
                    ->where('cuenta_id','LIKE','%1%')
                    ->orderby('id','asc');
        $cpagos= DB::table('pagos')                    
                    ->count();
        */
        //return view('pagos.mostrar');
        

        /* while ($cpagos>0) {
            $a=$pagos as pago;
            echo $a->get();
            $cpagos=$cpagos-1;
        } */
        
        $conexion=mysqli_connect('localhost','root','','prestamos');
        $consulta='SELECT * FROM cuentas c WHERE c.Observaciones != "Cancelado"';
        $resultado=mysqli_query($conexion,$consulta);
        
       
        if ($resultado->num_rows>0) {
            while ($fila = $resultado ->fetch_assoc()) {
                $cpagos="SELECT * FROM pagos p WHERE p.cuenta_id = $fila[id] order by p.N_Cuota desc limit 1";
                $rpagos=mysqli_query($conexion,$cpagos);
                //
                //echo $filap['id'];
                if ($rpagos->num_rows>0) {
                    $filap = $rpagos ->fetch_assoc();
                    if ($fila['F_Pago'] =='Semanal') {
                       if ($filap['Situacion'] == 'Pagado') {
                            $date = Carbon::now()->subWeek()->format('Y-m-d');
                            if ($filap['F_Pago']==$date) {

                                $clientes="SELECT * FROM clientes c WHERE c.id = $fila[cliente_id] ";
                                $cliente=mysqli_query($conexion,$clientes);
                                $filac = $cliente ->fetch_assoc();

                                $sc=$filap['N_Cuota']+1;
                                $DNI=$filac['DNI'];
                                $Nombre_y_Apellido=$filac['Nombre_y_Apellido'];
                                $Domicilio=$filac['Domicilio'];
                                $Barrio=$filac['Barrio'];
                                $Localidad=$filac['Localidad'];
                            
                                $fecha= date('Y-m-d');
                                DB::table('pagos')->insert(
                                    array(
                                        'cuenta_id'     =>   $fila['id'], 
                                        'Monto'   =>   $fila['Cuotas'],
                                        'F_Pago'     =>   $fecha, 
                                        'Detalles'   =>  $fila['Observaciones'] ,
                                        'Situacion'     =>  'Impago', 
                                        'N_Cuota'   =>   $sc,
                                        'DNI'   =>   $DNI,
                                        'Nombre_y_Apellido'   =>   $Nombre_y_Apellido,
                                        'Domicilio'   =>   $Domicilio,
                                        'Barrio'   =>   $Barrio,
                                        'Localidad'   =>   $Localidad
                                    )
                                );
                            }
                       }
                    }elseif ($fila['F_Pago'] =='Diario') {
                        if ($filap['Situacion'] == 'Pagado') {                        
                            
                            $clientes="SELECT * FROM clientes c WHERE c.id = $fila[cliente_id] ";
                                $cliente=mysqli_query($conexion,$clientes);
                                $filac = $cliente ->fetch_assoc();

                                $sc=$filap['N_Cuota']+1;
                                $DNI=$filac['DNI'];
                                $Nombre_y_Apellido=$filac['Nombre_y_Apellido'];
                                $Domicilio=$filac['Domicilio'];
                                $Barrio=$filac['Barrio'];
                                $Localidad=$filac['Localidad'];
                            
                                $fecha= date('Y-m-d');
                                DB::table('pagos')->insert(
                                    array(
                                        'cuenta_id'     =>   $fila['id'], 
                                        'Monto'   =>   $fila['Cuotas'],
                                        'F_Pago'     =>   $fecha, 
                                        'Detalles'   =>  $fila['Observaciones'] ,
                                        'Situacion'     =>  'Impago', 
                                        'N_Cuota'   =>   $sc,
                                        'DNI'   =>   $DNI,
                                        'Nombre_y_Apellido'   =>   $Nombre_y_Apellido,
                                        'Domicilio'   =>   $Domicilio,
                                        'Barrio'   =>   $Barrio,
                                        'Localidad'   =>   $Localidad
                                    )
                                );
                        }
                    } 
                }
            }
            
            $imp="Impago";
            $pagos= DB::table('pagos')
                    ->select('id','cuenta_id','Monto','F_Pago','Detalles','Situacion','N_Cuota','DNI','Nombre_y_Apellido','Domicilio','Barrio','Localidad')
                    ->where('Situacion','=',$imp)
                    ->orderby('id','desc')
                    ->paginate(10);
            return view('pagos.create',compact('pagos'));
            
        }



    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    
    for ($i = 1; $i < count(array($request->Situacion)); $i++) {
        $answers[] = [
            'cuenta_id' => $request->cuenta_id[$i],
            'Monto' => $request->Monto[$i],
            'F_Pago' => $request->F_Pago[$i],
            'Detalles' => $request->Detalles[$i],
            'Situacion' => $request->Situacion[$i]
        ];
    }
    pago::insert($answers);
    return redirect('submitted')->with('status', 'Your answers successfully submitted');
} 
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pago  $pago
     * @return \Illuminate\Http\Response
     */
     /** @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       $pagos = pago::all();
       foreach($pagos as $pago){
            echo ($pago->id); 
       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pago  $pago
     * @return \Illuminate\Http\Response
     */
     /** @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit(Pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pago  $pago
     * @return \Illuminate\Http\Response
     */
     /** @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pago $pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pago  $pago
     * @return \Illuminate\Http\Response
     */
     /** @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pago $pago)
    {
        //
    }
}
