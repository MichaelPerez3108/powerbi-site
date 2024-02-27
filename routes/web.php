<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlobController;
use App\Http\Controllers\ObjetosController;
use App\Models\Blob;
use App\Models\Objeto;
use App\Models\Objetos;
use App\Models\User;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/main', function (){
    return view ('main');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/blob', [BlobController::class, 'index'])->name('blob.index');
Route::get('/blob/create', [BlobController::class, 'create'])->name('blob.create');
Route::get('/blob/edit', [BlobController::class, 'edit'])->name('blob.edit');

// corregir este metodo para que solo este la ruta y el crear lo haga el controlador
Route::post('/blob/create', function () {
    Blob::create([
        'content' => request('blob')
    ]);
    return view('blob.index');
});

Route::get('objects', [ObjetosController::class, 'index'])->name('objects.index');
Route::get('objects/create', [ObjetosController::class, 'create'])->name('objects.create');
Route::get('objects/edit', [ObjetosController::class, 'edit'])->name('objects.edit');
Route::get('objects/listado', function () {
    return view('objects.listado');
});

/* metodo de creacion retornando la vista index de los objetos
Route::post('/blob/create', function () {
    Objeto::create([
        'parent_id' => request('parent_id'),
        'name' => request('name'),
        'type' => request('type'),
        'blob_id' => request('blob_id')
    ]);
    return view('objects.index');
});
*/

Route::get('objects/{id}', [ObjetosController::class, 'show']);

Route::post('objects/create', [ObjetosController::class, 'store']);

Route::delete('objects/{id}', [ObjetosController::class, 'destroy']);

// Ruta para recibir los datos a actualizar objeto

Route::put('objects/{id}', [ObjetosController::class, 'update']);


Route::controller(ObjetosController::class)->prefix('objetos')->name('objetos.')->group(function () {
    Route::get('/', 'index')->name('index');
    //Route::get('/create', 'create')->name('create');
    Route::post('/create', 'store')->name('store');
    Route::get('/{objeto}/{type?}', 'show')->name('show');
    //Route::get('/{objeto}/edit', 'edit')->name('edit');
    Route::post('/{objeto}/edit', 'update')->name('update');
    Route::post('/{objeto}/delete', 'delete')->name('delete');
    /*
    // rest
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{objeto}', 'show')->name('show');
    Route::get('/{objeto}/edit', 'edit')->name('edit');
    Route::put('/{objeto}', 'update')->name('update');
    Route::delete('/{objeto}', 'delete')->name('delete');
    */
});

require __DIR__ . '/auth.php';
