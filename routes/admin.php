<?php

use App\Http\Controllers\Admin\ConmutadorController;
use App\Http\Controllers\Admin\CpuController;
use App\Http\Controllers\Admin\EquipamientoController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ImagenCpuController;
use App\Http\Controllers\Admin\ImagenMonitorController;
use App\Http\Controllers\Admin\ImpresoraController;
use App\Http\Controllers\Admin\InventarioController;
use App\Http\Controllers\Admin\IpController;
use App\Http\Controllers\Admin\MonitorController;
use App\Http\Controllers\Admin\PuestoController;
use App\Http\Controllers\Admin\RackController;
use App\Http\Controllers\Admin\ScannerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SectorController;
use App\Models\ImagenCpu;

/* use App\Models\ImagenMonitor; */

//Como tienen el prefijo Admin en "RouteServiceProvider", no necesita nada en el get
Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('sectores', SectorController::class)->names('admin.sectores');

Route::resource('racks', RackController::class)->names('admin.racks');

Route::resource('ips', IpController::class)->names('admin.ips');

Route::resource('conmutadores', ConmutadorController::class)->names('admin.conmutadores');

Route::resource('monitores', MonitorController::class)->names('admin.monitores');
Route::get('monitores/imagenes/{monitor}', [MonitorController::class, 'imagenes'])->name('admin.monitores.imagenes');

Route::resource('imagenMonitores', ImagenMonitorController::class)->names('admin.imagenMonitores');
Route::post('imagenMonitores/store2/{id}', [ImagenMonitorController::class, 'store2'])->name('admin.imagenMonitores.store2');
Route::get('imagenMonitores/create2/{id}', [ImagenMonitorController::class, 'create2'])->name('admin.imagenMonitores.create2');

Route::resource('cpus', CpuController::class)->names('admin.cpus');
//Imagenes de CPU:
Route::get('cpus/imagenes/{cpu}', [CpuController::class, 'imagenes'])->name('admin.cpus.imagenes');
Route::get('imagenCpus/create/{id}', [ImagenCpuController::class, 'create'])->name('admin.imagenCpus.create');
Route::post('imagenCpus/store/{id}', [ImagenCpuController::class, 'store'])->name('admin.imagenCpus.store');
Route::delete('imagnCpus/destroy/{imagenCpu}', [ImagenCpuController::class, 'destroy'])->name('admin.imagenCpus.destroy');

Route::resource('impresoras', ImpresoraController::class)->names('admin.impresoras');

Route::resource('scanners', ScannerController::class)->names('admin.scanners');

Route::resource('equipamientos', EquipamientoController::class)->names('admin.equipamientos');

Route::resource('puestos', PuestoController::class)->names('admin.puestos');

Route::get('puestos/desconectar/{conexion}', [PuestoController::class, 'desconectar'])->name('admin.puestos.desconectar');

Route::get('ips/liberar/{conexion}', [IpController::class, 'liberar'])->name('admin.ips.liberar');

Route::get('inventario/{id}', [InventarioController::class, 'show'])->name('admin.inventario.show');


//Create particulares de Switchs NO LOS USO.. 
/* Route::get('admin/conmutadores/create2', [ConmutadorController::class, 'create2'])->name('admin.conmutadores.createSwitchSector');
Route::get('admin/conmutadores/create3', [ConmutadorController::class, 'create3'])->name('admin.conmutadores.createSwitchRack');

Route::post('admin/conmutadores/store2', [ConmutadorController::class, 'store2'])->name('admin.conmutadores.storeSwitchSector');
Route::post('admin/conmutadores/store3', [ConmutadorController::class, 'store3'])->name('admin.conmutadores.storeSwitchRack'); */