<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenRack extends Model
{
    use HasFactory;

    protected $table = "imagenes_rack";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function rack(){
        return $this->belongsTo(Impresora::class);
    }
}
