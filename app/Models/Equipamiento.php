<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamiento extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Relación uno a uno inversa con Puesto
    public function puesto(){
        return $this->hasOne(Puesto::class);
    }

    //Relación uno a uno con CPU
    public function cpu(){
        return $this->hasOne(Cpu::class);
    }

    //Relación uno a muchos con Monitor
    public function monitores(){
        return $this->hasMany(Monitor::class);
    }

    //Relación uno a muchos con Scanner
    public function scanners(){
        return $this->hasMany(Scanner::class);
    }
 
    //Relación uno a muchos con Impresora
    public function impresoras(){
        return $this->hasMany(Impresora::class);
    }
}
