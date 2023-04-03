<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenCpu extends Model
{
    use HasFactory;

    protected $table = "imagenes_cpu";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function cpu(){
        return $this->belongsTo(Cpu::class);
    }

}
