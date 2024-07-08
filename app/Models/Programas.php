<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programas extends Model
{
    use HasFactory;

    public function promociones()
    {
        return $this->belongsToMany(Promociones::class);
    }
   // relaciones correguidas 
   // Un programa tiene muchos programas-usuarios

   public function programasUsuarios()
   {
       return $this->hasMany(ProgramaUsuarios::class);
   }
   public function calendario_entrevista()
   {
       return $this->hasOne(CalendarioEntrevistas::class, 'programa_id');
   }
}
