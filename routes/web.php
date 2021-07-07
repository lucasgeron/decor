<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\{
    Categories,
    Locals,
    Products, 
    Clients,
    Orders,
    Indexes,
    Tests
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

Route::get('/teste', Tests::class)->middleware(['auth:sanctum', 'verified'])->name('tests.index');
Route::get('/locais', Locals::class)->middleware(['auth:sanctum', 'verified'])->name('locals.index');
Route::get('/locais/{id}', Indexes::class)->middleware(['auth:sanctum', 'verified'])->name('indexes.index');

Route::get('/categorias', Categories::class)->middleware(['auth:sanctum', 'verified'])->name('categories.index');
Route::get('/clientes', Clients::class)->middleware(['auth:sanctum', 'verified'])->name('clients.index');
Route::get('/pedidos', Orders::class)->middleware(['auth:sanctum', 'verified'])->name('orders.index');
Route::get('/produtos', Products::class)->middleware(['auth:sanctum', 'verified'])->name('products.index');

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

