<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rack extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Para que utilice el Slug, en vez del id, en la ruta.
    public function getRouteKeyName(){
        return "slug";
    }

    //Relación uno a muchos (Switch) Conmutador
    public function conmutadores(){
        return $this->hasMany(Conmutador::class);
    }

    //Relación uno a muchos con imagenes_impresora
    public function imagenes(){
        return $this->hasMany(ImagenRack::class);
    }
}
