<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenConmutador extends Model
{
    use HasFactory;

    protected $table = "imagenes_conmutador";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function conmutador(){
        return $this->belongsTo(Conmutador::class);
    }

}
