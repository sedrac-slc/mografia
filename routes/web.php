<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    TemaController,
    PainelController,
    TituloController,
    ProjectoController,
    SubtituloController,
    MunicipioController,
    ComponentsController,
    ParagrafoTituloController,
    ParagrafoSubtituloController
};

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
})->name('home');

Route::get('/back', function () {
    return redirect()->back();
})->name('back');

Route::middleware('auth')->group(function () {
    Route::get('/painel', function () {
        return view('dashboard');
    })->name('painel');

    Route::get('/painel/{page}',[PainelController::class,'pages'])->name('painel.page');

    Route::delete('/painel/tema',[TemaController::class,'destroy'])->name('tema.delete');
    Route::post('/painel/tema',[TemaController::class,'store'])->name('tema.create');
    Route::put('/painel/tema/',[TemaController::class,'update'])->name('tema.update');
    Route::post('/painel/tema/projecto',[TemaController::class,'project'])->name('tema.view.projecto');

    Route::get('/painel/titulo/{id}',[TituloController::class,'default'])->name('titulo.page');
    Route::post('/painel/titulo',[TituloController::class,'store'])->name('titulo.create');
    Route::put('/painel/titulo',[TituloController::class,'update'])->name('titulo.update');
    Route::delete('/painel/titulo',[TituloController::class,'destroy'])->name('titulo.delete');

    Route::get('/painel/subtitulo/{id}',[SubtituloController::class,'default'])->name('subtitulo.page');
    Route::post('/painel/subtitulo',[SubtituloController::class,'store'])->name('subtitulo.create');
    Route::put('/painel/subtitulo',[SubtituloController::class,'update'])->name('subtitulo.update');
    Route::delete('/painel/subtitulo',[SubtituloController::class,'destroy'])->name('subtitulo.delete');

    Route::get('/painel/projecto/{id}',[ProjectoController::class,'default'])->name('projecto.page');
    Route::post('/painel/projecto',[ProjectoController::class,'store'])->name('projecto.create');
    Route::put('/painel/projecto',[ProjectoController::class,'update'])->name('projecto.update');
    Route::delete('/painel/projecto',[ProjectoController::class,'destroy'])->name('projecto.delete');

    Route::get('/conteudo/titulo/{id}',[ParagrafoTituloController::class,'default'])->name('conteudo.titulo.page');
    Route::get('/conteudo/subtitulo/{id}',[ParagrafoSubtituloController::class,'default'])->name('conteudo.subtitulo.page');
});

Route::get('/tema/json/{desc}',[TemaController::class,'elements']);
Route::get('/municipio/json/{id}',[MunicipioController::class,'elements']);
Route::get('/list/produto/tipo/json',[ComponentsController::class,'listProjectoTipo']);

require __DIR__.'/auth.php';
