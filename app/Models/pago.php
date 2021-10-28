<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pago extends Model
{
    use HasFactory;
    protected $table="pagos";
    protected $primaryKey="id";
    protected $fillable=[
        'cuenta_id','Monto','F_Pago','Destalles','Situacion'
        ];
    public $timestamps = false;
}
