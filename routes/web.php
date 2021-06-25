<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\{
    Categories,
    Stocks, 
    Teste
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

Route::get('/teste', Teste::class)->middleware(['auth:sanctum', 'verified'])->name('teste');
Route::get('/estoques', Stocks::class)->middleware(['auth:sanctum', 'verified'])->name('stocks.index');
Route::get('/categorias', Categories::class)->middleware(['auth:sanctum', 'verified'])->name('categories.index');

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

