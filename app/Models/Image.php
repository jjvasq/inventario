<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['url'];

    public function imageable(){
        return $this->morphTo(); //Acá hay que ver el tema de más de una..
    }

    public function imageable2(){
        return $this->morphTo(); //Acá hay que ver el tema de más de una..
    }
}
