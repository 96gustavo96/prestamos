<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Cuenta;
use  App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class Pago extends Model
{
    //use HasFactory;
    protected $table="pagos";
    protected $primaryKey="id";
    protected $fillable=[
        'cuenta_id','Cuota','Fecha','Descripcion'
        ];
    public $timestamps = false;
}
