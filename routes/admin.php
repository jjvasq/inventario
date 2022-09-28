<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\IpController;
use App\Http\Controllers\Admin\RackController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SectorController;

//Como tienen el prefijo Admin en "RouteServiceProvider", no necesita nada en el get
Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('sectores', SectorController::class)->names('admin.sectores');

Route::resource('racks', RackController::class)->names('admin.racks');

Route::resource('ips', IpController::class)->names('admin.ips');