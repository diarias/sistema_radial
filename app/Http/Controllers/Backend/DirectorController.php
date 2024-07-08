<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function panel(){
        return view('director.panel');
    }
   /* public function login(){
        return view('director.auth.login');
    }*/
}
