<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SectorController;

//Como tienen el prefijo Admin en "RouteServiceProvider", no necesita nada en el get
Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('sectores', SectorController::class)->names('admin.sectores');