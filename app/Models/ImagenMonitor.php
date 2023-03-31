<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenMonitor extends Model
{
    use HasFactory;

    protected $table = "imagenes_monitor";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function monitor(){
        return $this->belongsTo(Monitor::class);
    }
}
