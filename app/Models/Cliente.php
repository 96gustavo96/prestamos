<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //use HasFactory;
    protected $table = "clientes";
    protected $primaryKey="id";
    protected $fillable=[
        'DNI','Nombre_y_Apellido','Nacimiento','Domicilio','Barrio','Localidad','Rubro','Telefono'
        ];
    public $timestamps = false;
}
