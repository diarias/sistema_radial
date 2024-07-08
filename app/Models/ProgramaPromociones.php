<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramaPromociones extends Model
{
    use HasFactory;
   
    public function programas(){
        return $this->belongsTo(Programas::class);
    }

    public function promociones(){
        return $this->belongsTo(Promociones::class);
    }

}
