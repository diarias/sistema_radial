<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoordinadorController extends Controller
{
    public function panel(){
        return view('coordinador.panel');
    }
  /*  public function login(){
        return view('coordinador.auth.login');
    }*/
}
