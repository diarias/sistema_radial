<?php

use App\Http\Controllers\Backend\LocutorController;
use Illuminate\Support\Facades\Route;

Route::get('panel', [LocutorController::class, 'panel'])->name('panel');
