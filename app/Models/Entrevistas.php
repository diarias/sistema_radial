<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrevistas extends Model
{
    use HasFactory;
    public function programa()
    {
        return $this->belongsTo(Programas::class, 'programa_id');
    }

   // Relación con el modelo CalendarioEntrevistas
   public function calendario_entrevista()
   {
       return $this->hasOne(CalendarioEntrevistas::class, 'entrevista_id');
   }
}
