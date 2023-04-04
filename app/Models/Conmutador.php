<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conmutador extends Model
{
    use HasFactory;
    
    protected $table = "conmutadores";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Relación uno a muchos con Conexión
    public function conexiones(){
        return $this->hasMany(Conexion::class);
    }

    //Relación uno a uno con Sector vuelta
    public function sector(){
        return $this->belongsTo(Sector::class);
    }

    //Relación uno a muchos inversa con Racks
    public function rack(){
        return $this->belongsTo(Rack::class);
    }

    //Relación uno a muchos con imagenes_conmutador
    public function imagenes(){
        return $this->hasMany(ImagenConmutador::class);
    }
}
