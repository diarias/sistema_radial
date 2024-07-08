<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarioEntrevistas extends Model
{
    use HasFactory;

    protected $table = 'calendario_entrevistas';

    public function entrevista()
    {
        return $this->belongsTo(Entrevistas::class, 'entrevista_id');
    }
    public function programa()
    {
        return $this->belongsTo(Programas::class, 'programa_id');
    }
}
