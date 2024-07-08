<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promociones extends Model
{
    use HasFactory;
    public function programas(){
        return $this->belongsToMany(Programas::class);
    }
    public function calendario_Promo()
    {
        return $this->belongsToMany(CalendarioPromociones::class);
    }
    public function usuario()
    {
        return $this->belongsToMany(User::class);
    }
}
