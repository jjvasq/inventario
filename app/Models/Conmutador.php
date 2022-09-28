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

    //Relación uno a uno con Sector
    public function sector(){
        return $this->hasOne(Sector::class);
    }

    //Relación uno a muchos inversa con Racks
    public function rack(){
        return $this->belongsTo(Rack::class);
    }
}
