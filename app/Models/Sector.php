<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    protected $table = "sectores";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Para que utilice el Slug, en vez del id, en la ruta.
    public function getRouteKeyName(){
        return "slug";
    }

    //Relación uno a uno inversa con Conmutador
    public function conmutador(){
        return $this->hasOne(Conmutador::class);
    }

    //Relación uno a muchos inversa con Puesto
    public function puestos(){
        return $this->hasMany(Puesto::class);
    }
}
