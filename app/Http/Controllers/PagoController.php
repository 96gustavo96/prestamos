<?php

namespace App\Http\Controllers;

use App\Models\pago;
use Illuminate\Http\Request;

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
                    ->select('id','cuenta_id','Monto','F_Pago','Detalles','Situacion')
                    ->where('id','LIKE','%'.$Busqueda.'%')
                    ->orderby('id','asc')
                    ->paginate(10);
        return view('pagos.index',compact('pagos','Busqueda'));
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
        $fila = $resultado ->fetch_assoc();
       
        if ($resultado->num_rows>0) {
            while ($fila = $resultado ->fetch_assoc()) {
                $cpagos="SELECT * FROM pagos p WHERE p.cuenta_id = $fila[id] order by p.N_Cuota desc";
                $rpagos=mysqli_query($conexion,$cpagos);
                $filap = $rpagos ->fetch_assoc();
                //echo $filap['id'];
                if ($filap['Situacion'] == 'Pagado') {
                    
                    $sc=$filap['N_Cuota']+1;
                    echo $sc;
                    //$sql="INSERT INTO pagos (cuenta_id,Monto, F_Pago, Detalles, Situacion, N_Cuota)VALUES ('$fila[id]', '$fila[Cuotas]', '2021-10-21', 'Pago HOY', 'Impago', '$sc')";
                    //$crearp="INSERT INTO pagos p (p.cuenta_id, p.Monto ,p.F_Pago,p.Detalles,p.Situacion,p.N_Cuota)VALUES (,$, '','','',$sc)";
                    echo $filap['id'];
                    
                    $fecha= date('Y-m-d');
                    DB::table('pagos')->insert(
                        array(
                               'cuenta_id'     =>   $fila['id'], 
                               'Monto'   =>   $fila['Cuotas'],
                               'F_Pago'     =>   $fecha, 
                               'Detalles'   =>  $fila['Observaciones'] ,
                               'Situacion'     =>  'Impago', 
                               'N_Cuota'   =>   $sc
                        )
                   );
                }else {
                    echo 'Nhay pgos que imprimir';
                }
            }
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
    public function show(pago $pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $Busqueda=$request->get('pagarc');
        
        echo $Busqueda;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pago $pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(pago $pago)
    {
        //
    }
}
