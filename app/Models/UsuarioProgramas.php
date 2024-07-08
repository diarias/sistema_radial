<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioProgramas extends Model
{
    use HasFactory;
        //relacion de programas usuarios
        public function usuario()
        {
            return $this->belongsTo(User::class, 'usuario_id');
        }
        
        public function programa()
        {
            return $this->belongsTo(Programas::class, 'programa_id');
        }
}
