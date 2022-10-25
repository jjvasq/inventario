<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cpu extends Model
{
    use HasFactory;
    
    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Relación uno a uno inversa con Equipamiento
    public  function equipamiento(){
        return $this->belongsTo(Equipamiento::class);
    }
}
