<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActuController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MonCompteController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/moncompte', [MonCompteController::class, 'index'])->name("moncompte") ;

Route::get('/panier', [MonCompteController::class, 'panier'])->name("panier") ;

Route::get('/admin', [DashboardController::class, 'index'])->middleware(['auth'])
->name("dashboard") ;



// Route administration permet d'administrer ou de lister les utilisateurs
Route::get('/admin/user', [UserController::class, 'index'])->middleware(['auth'])
->name("user") ;

// Gestion des droits administrateurs
Route::get('/admin/user/right/{user}', [UserController::class, 'manage_right'])->middleware(['auth'])
->name("admin-user-right") ;





/********* 
 * 
 * CRUD DES ACTUS COTÉ ADMIN
 * 
 *********/




// Route administration permet d'ajouter les actus CREATE
Route::get('/admin/actu-editer', [ActuController::class, 'actu_editer'])->middleware(['auth'])
->name("admin-actu-editer") ;

Route::post('/admin/editer', [ActuController::class, 'create'])->name("editer") ;




// Route administration permet de lister les actus READ
Route::get('/admin/actu-lister', [ActuController::class, 'index'])->middleware(['auth'])
->name("admin-actu-lister") ;




// Route administration permet de modifier les actus UPDATE
Route::get('/admin/actu-editer/{listeactu}', [ActuController::class, 'actu_editer'])->middleware(['auth'])
->name("admin-actu-modifier") ;

Route::post('/admin/modifier/{listeactu}', [ActuController::class, 'update'])->name("modifier") ;




// Route administration permet de supprimer les actus DELETE
Route::post('/admin/supprimer/{listeactu}', [ActuController::class, 'delete'])->name("supprimer") ;





/**********
 * 
 * LISTE DES ACTUS AVEC LES DÉTAILS COTÉ CLIENT
 * 
 *********/




// Route client permet de lister les actus
Route::get('/client-lister', [NewsController::class, 'index'])
->name("client_lister") ;




// Route client permet d'accéder aux détails des actus
Route::get('/client-detail/{listeactu}', [NewsController::class, 'detail'])
->name("client_detail") ;