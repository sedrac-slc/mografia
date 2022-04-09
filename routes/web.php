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
    ColaboradorController,
    ParagrafoTituloController,
    ParagrafoSubtituloController,
    ColaboracaoProjectosController
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

    Route::get('/painel/titulo/subtitulo/{id}',[TituloController::class,'subtitulo'])->name('titulo.subtitulo');
    Route::get('/painel/titulo/{id}',[TituloController::class,'default'])->name('titulo.page');
    Route::post('/painel/titulo',[TituloController::class,'store'])->name('titulo.create');
    Route::put('/painel/titulo',[TituloController::class,'update'])->name('titulo.update');
    Route::delete('/painel/titulo',[TituloController::class,'destroy'])->name('titulo.delete');

    Route::post('/painel/titulo/json/add',[TituloController::class,'store_json'])->name('titulo.store.json');
    Route::get('/painel/titulo/json/apagar/{id}',[TituloController::class,'destroy_json'])->name('titulo.delete.json');
    Route::post('/painel/titulo/json/upd',[TituloController::class,'update_json'])->name('titulo.update.json');
    Route::get('/painel/titulo/json/{id}',[TituloController::class,'list_json'])->name('titulo.list.json');
    Route::get('/painel/titulo/max/prioridade/json/{id}',[TituloController::class,'max_prioridade_json'])->name('titulo.max.prioridade.json');

    Route::get('/painel/subtitulo/{id}',[SubtituloController::class,'default'])->name('subtitulo.page');
    Route::post('/painel/subtitulo',[SubtituloController::class,'store'])->name('subtitulo.create');
    Route::put('/painel/subtitulo',[SubtituloController::class,'update'])->name('subtitulo.update');
    Route::delete('/painel/subtitulo',[SubtituloController::class,'destroy'])->name('subtitulo.delete');

    Route::post('/painel/subtitulo/json/add',[SubtituloController::class,'store_json'])->name('subtitulo.store.json');
    Route::get('/painel/subtitulo/json/apagar/{id}',[SubtituloController::class,'destroy_json'])->name('subtitulo.delete.json');
    Route::post('/painel/subtitulo/json/upd',[SubtituloController::class,'update_json'])->name('subtitulo.update.json');
    Route::get('/painel/subtitulo/json/{id}',[SubtituloController::class,'list_json'])->name('subtitulo.list.json');
    Route::get('/painel/subtitulo/max/prioridade/json/{id}',[SubtituloController::class,'max_prioridade_json'])->name('subtitulo.max.prioridade.json');

    Route::get('/painel/projecto/titulo/{id}',[ProjectoController::class,'titulo'])->name('projecto.titulo');
    Route::get('/painel/projecto/{id}',[ProjectoController::class,'default'])->name('projecto.page');
    Route::post('/painel/projecto',[ProjectoController::class,'store'])->name('projecto.create');
    Route::put('/painel/projecto',[ProjectoController::class,'update'])->name('projecto.update');
    Route::delete('/painel/projecto',[ProjectoController::class,'destroy'])->name('projecto.delete');

    Route::get('/conteudo/titulo/{id}',[ParagrafoTituloController::class,'default'])->name('conteudo.titulo.page');
    Route::get('/conteudo/subtitulo/{id}',[ParagrafoSubtituloController::class,'default'])->name('conteudo.subtitulo.page');

    Route::post('/conteudo/titulo/json/add',[ParagrafoTituloController::class,'store_json'])->name('conteudo.titulo.store.json');
    Route::get('/conteudo/titulo/json/show/{titulo}',[ParagrafoTituloController::class,'show_json'])->name('conteudo.titulo.show.json');
    Route::get('/conteudo/titulo/json/delete/{id}',[ParagrafoTituloController::class,'delete_json'])->name('conteudo.titulo.delete.json');
    Route::post('/conteudo/titulo/json/upd/{id}',[ParagrafoTituloController::class,'update_json'])->name('conteudo.titulo.update.json');

    Route::post('/conteudo/subtitulo/json/add',[ParagrafoSubtituloController::class,'store_json'])->name('conteudo.subtitulo.store.json');
    Route::get('/conteudo/subtitulo/json/show/{subtitulo}',[ParagrafoSubtituloController::class,'show_json'])->name('conteudo.subtitulo.show.json');
    Route::get('/conteudo/subtitulo/json/delete/{id}',[ParagrafoSubtituloController::class,'delete_json'])->name('conteudo.subtitulo.delete.json');
    Route::post('/conteudo/subtitulo/json/upd/{id}',[ParagrafoSubtituloController::class,'update_json'])->name('conteudo.subtitulo.update.json');

    Route::get('/painel/colaborador/{id}',[ColaboradorController::class,'insert'])->name('colaborador.insert');

    Route::get('/painel/colaboracao/projecto/{id}',[ColaboracaoProjectosController::class,'colaborar'])->name('colaboracao.projecto');
    Route::post('/painel/colaboracao',[ColaboracaoProjectosController::class,'email'])->name('colaboracao.email');
    Route::delete('/painel/colaboracao',[ColaboracaoProjectosController::class,'destroy'])->name('colaboracao.delete');

    Route::get('/municipio/json/{id}',[MunicipioController::class,'elements'])->name('municio.show.json');

});


Route::get('/tema/json/{desc}',[TemaController::class,'elements']);
Route::get('/projecto/tema/json/{id}',[ProjectoController::class,'elements']);
Route::get('/list/produto/tipo/json',[ComponentsController::class,'listProjectoTipo']);

require __DIR__.'/auth.php';
