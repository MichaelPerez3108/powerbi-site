<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlobController;
use App\Http\Controllers\OAuthController;
use App\Http\Controllers\ObjetosController;
use Symfony\Component\HttpKernel\Profiler\Profile;


Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        //    return view('welcome');
        return redirect('objects.index');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(ObjetosController::class)->prefix('objects')->name('objects.')->group(function () {
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
});


//Route::get('/auth/microsoft', 'Auth\LoginController@redirectToMicrosoft');
//Route::get('/auth/microsoft/callback', 'Auth\LoginController@handleMicrosoftCallback');
//Route::post('/pbi/access-token', [OAuthController::class, 'getAccessToken']);




require __DIR__ . '/auth.php';
