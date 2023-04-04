<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenPuesto extends Model
{
    use HasFactory;

    protected $table = "imagenes_puesto";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function puesto(){
        return $this->belongsTo(Puesto::class);
    }
}
