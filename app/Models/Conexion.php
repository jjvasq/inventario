<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conexion extends Model
{
    use HasFactory;

    protected $table = "conexiones";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Relación uno a muchos con (Switch) Conmutador inversa
    public function conmutador(){
        return $this->belongsTo(Conmutador::class);
    }

    //Relación uno a uno inversa con Puesto
    public function puesto(){
        return $this->belongsTo(Puesto::class);
    }

    //Relación uno a uno con Ip
    public function ip(){
        return $this->belongsTo(Ip::class);
    }
}
