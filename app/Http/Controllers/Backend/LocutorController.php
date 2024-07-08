<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocutorController extends Controller
{
    public function panel(){
        return view('locutor.panel');
    }
    /*public function login(){
        return view('locutor.auth.login');
    }*/
}
