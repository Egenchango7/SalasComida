<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PlatoController;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\UbicacionController;
use App\Models\Login;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', RestauranteController::class);
// Route::get('/map', UbicacionController::class);
Route::get('/login', function (){
    return view('login');
});
Route::get('/locations', [UbicacionController::class, 'listLocations']);
Route::post('login',[LoginController::class,'validacionAction'])->name('login');
Route::get('/admin',[RestauranteController::class, 'adminView'])->name('admin');
Route::get('/rest/{id}', [RestauranteController::class, 'getRestById']);
Route::post('/rest/create', [RestauranteController::class, 'newRest'])->name('rest.new');
Route::post('/update/rest', [RestauranteController::class, 'updateRest'])->name('rest.update');
Route::get('/menus/rest/{rest}', [MenuController::class, 'getInfoMenuByRest']);
Route::get('/tipos_menu/rest/{rest}', [MenuController::class, 'getTiposMenuByRest']);
Route::get('/platos/tipo/{tipo}/rest/{rest}', [PlatoController::class, 'getPlatosByTipoAndRest']);
Route::get('/platos/tipo/{tipo}', [PlatoController::class, 'getPlatosByTipo']);
//add
Route::post('/plato/create', [PlatoController::class, 'addPlato'])->name('plato.add');
