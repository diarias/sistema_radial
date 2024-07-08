<?php

use App\Http\Controllers\Backend\ProductorController;
use Illuminate\Support\Facades\Route;

Route::get('panel', [ProductorController::class, 'panel'])->name('panel');
