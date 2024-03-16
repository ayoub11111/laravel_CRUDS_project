<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [LivreController::class, 'afficher'])->name('afficher_livres');
Route::get('/ajouter', [LivreController::class, 'ajouter'])->name('ajouter_livres');
Route::post('/', [LivreController::class, 'store'])->name('store_livres');
Route::get('/{livre}/edit', [LivreController::class, 'edit'])->name('edit_livres');
Route::put('/{livre}/modifier', [LivreController::class, 'modifier'])->name('modifier_livres');
Route::delete('/{livre}/supprimer', [LivreController::class, 'supprimer'])->name('supprimer_livres');
Route::get('/search', [LivreController::class, 'search'])->name('search_livres');
