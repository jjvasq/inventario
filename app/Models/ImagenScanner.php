<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenScanner extends Model
{
    use HasFactory;

    protected $table = "imagenes_scanner";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function scanner(){
        return $this->belongsTo(Scanner::class);
    }
}
