<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    //use HasFactory;
    protected $table="cuentas";
    protected $primaryKey="id";
    protected $fillable=[
        'cliente_id','Articulo','F_Pago','C_Pagos','Cuotas','F_Inicio','F_Vencimiento','Observaciones'
        ];
    public $timestamps = false;
}
