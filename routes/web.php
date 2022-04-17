<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
                            EntrarController
                    
                    
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


//   A U T  E  N T  I  C  A  Ç  A  O
    Route::get('/entrar', function () {
      return view('auth.entrar');
    })->name('entrar');
    Route::post('/entrar/do', [EntrarController::class,'index'])->name('do.login');


    //

    Route::name('admin.')->group(function () {
        Route::get('/pagina-principal', [EntrarController::class,'index'])->name('index');




    });

Route::get('/as', function () {
    return view('welcome');
});
