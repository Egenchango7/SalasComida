<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PlatoController;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\UserController;
use App\Models\Login;
use App\Models\Plato;
use App\Models\User;
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
Route::get('/locations', [UbicacionController::class, 'listLocations']);
Route::get('/login', [LoginController::class]);
Route::post('/login',[LoginController::class,'validacionAction'])->name('login');
Route::get('/admin',[RestauranteController::class, 'adminView'])->name('admin');
Route::get('/rest/{id}', [RestauranteController::class, 'getRestById']);
Route::post('/rest/create', [RestauranteController::class, 'newRest'])->name('rest.new');
Route::post('/update/rest', [RestauranteController::class, 'updateRest'])->name('rest.update');
Route::get('/menus/rest/{rest}', [MenuController::class, 'getInfoMenuByRest']);
Route::post('/menu/update', [MenuController::class, 'updateMenu'])->name('menu.update');
Route::post('/menu/create', [MenuController::class, 'newMenu'])->name('menu.new');
Route::get('/tipos_menu/rest/{rest}', [MenuController::class, 'getTiposMenuByRest']);
Route::get('/platos/tipo/{tipo}/rest/{rest}', [PlatoController::class, 'getPlatosByTipoAndRest']);
Route::get('/platos/tipo/{tipo}', [PlatoController::class, 'getPlatosByTipo']);
Route::post('/platos/update', [PlatoController::class, 'updatePlato'])->name('plato.update');
//add
Route::post('/plato/create', [PlatoController::class, 'addPlato'])->name('plato.add');
Route::post('/usuario/create', [LoginController::class, 'addUsuario'])->name('usuario.add'); 
Route::post('/usuario/update', [LoginController::class,'updateUsuario'])->name('usuario.update');
Route::get('/usuario/list',[LoginController::class,'listUsuario'])->name('usuario.list');

Route::get('/rest/delete/{id}', [RestauranteController::class, 'destroyRest'])->name('rest.destroy');
Route::get('/menu/delete/{id}',[MenuController::class,'destroyMenu'])->name('menu.destroy');
Route::get('/plato/delete/{id}', [PlatoController::class,'destroyPlato'])->name('plato.destroy');
Route::get('/user/delete/{id}', [LoginController::class,'destroyUser'])->name('user.destroy');

