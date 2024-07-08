<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductorController extends Controller
{
    public function panel(){
        return view('productor.panel');
    }
   /* public function login(){
        return view('productor.auth.login');
    }*/
}
