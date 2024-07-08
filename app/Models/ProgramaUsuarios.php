<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramaUsuarios extends Model
{
    use HasFactory;
  //relaciones correguidas 
  // muchos programas-usuarios tiene un program y un usuario

  
    public function programa()
    {
        return $this->belongsTo(Programas::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

}
