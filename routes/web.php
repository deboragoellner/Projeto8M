<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LocalAcolhimentoController;
use App\Http\Controllers\NoticiaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('base.dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('usuario', UsuarioController::class);
    Route::post('usuario/search', [UsuarioController::class, 'search'])->name(
        'usuario.search'
    );

    Route::resource('locaisacolhimento', LocalAcolhimentoController::class);
    Route::post('locaisacolhimento/search', [LocalAcolhimentoController::class, 'search'])->name(
        'locaisacolhimento.search'
    );

    Route::resource('noticias', NoticiaController::class);
    Route::post('noticias/search', [NoticiaController::class, 'search'])->name(
        'noticias.search'
    );

    Route::get('/profile', [ProfileController::class, 'edit'])->name(
        'profile.edit'
    );
    Route::patch('/profile', [ProfileController::class, 'update'])->name(
        'profile.update'
    );
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name(
        'profile.destroy'
    );
    
    Route::get('gmaps', 'HomeController@gmaps');
});

require __DIR__ . '/auth.php';
?>
