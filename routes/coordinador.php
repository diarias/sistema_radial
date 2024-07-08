<?php  
use App\Http\Controllers\Backend\CoordinadorController;
use Illuminate\Support\Facades\Route;

Route::get('panel', [CoordinadorController::class, 'panel'])->name('panel');