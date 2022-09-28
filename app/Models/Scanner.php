<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scanner extends Model
{
    use HasFactory;

    protected $table = "scanners";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Para que utilice el Slug, en vez del id, en la ruta.
    public function getRouteKeyName(){
        return "slug";
    }

    //Relación uno a muchos inversa con Equipamiento
    public function equipamiento(){
        return $this->belongsTo(Equipamiento::class);
    }
}
