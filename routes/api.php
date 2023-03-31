<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Auth::routes();

Route::group(['middleware' => ['auth:sanctum']], function () {
    // Route::get('/profile', function(Request $request) {
    //     return auth()->user();
    // });

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);

});
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);
Route::put('/verif/{id}', [App\Http\Controllers\API\AuthController::class, 'verif']);

Route::prefix('/admin')->group(function(){
    Route::controller(App\Http\Controllers\API\KategoriController::class)->prefix('/kategori')->middleware('auth:sanctum')->group(function(){
        Route::get('/','index');
        Route::post('/add','store');
        Route::put('/edit/{id}','update');
        Route::delete('/delete/{id}','destroy');
    });
    Route::controller(App\Http\Controllers\API\DashboardController::class)->prefix('/dashboard')->middleware('auth:sanctum')->group(function(){
        Route::get('/','indexA')->name('admin.dashboard');
        // Route::put('/edit/{id}','update');
        // Route::delete('/delete/{id}','destroy');
    });
    Route::controller(App\Http\Controllers\API\PenerbitController::class)->prefix('/penerbit')->middleware('auth:sanctum')->group(function(){
        Route::get('/','index');
        Route::post('/add','store');
        Route::put('/edit/{id}','update');
        Route::delete('/delete/{id}','destroy');
    });
    Route::controller(App\Http\Controllers\API\BukuController::class)->prefix('/buku')->middleware('auth:sanctum')->group(function(){
        Route::get('/','index');
        Route::post('/add','store');
        Route::post('/edit/{id}','update');
        Route::delete('/delete/{id}','destroy');
    });
    Route::controller(App\Http\Controllers\API\AnggotaController::class)->prefix('/anggota')->middleware('auth:sanctum')->group(function(){

        Route::get('/laporan','laporan');
        Route::get('/admin','indexA');
        Route::post('/add/admin','storeA');
        Route::put('/edit/admin/{id}','updateA');
        Route::delete('/delete/admin/{id}','destroyA');

        Route::get('/user','indexU');
        Route::post('/add/user','storeU');
        Route::put('/edit/user/{id}','updateU');
        Route::delete('/delete/user/{id}','destroyU');
        Route::put('/verif/user/{id}','verif');
    });
    Route::controller(App\Http\Controllers\API\IdentitasController::class)->prefix('/identitas')->middleware('auth:sanctum')->group(function(){
        Route::get('/','index');
        Route::post('/edit/{id}','update');
    });
    Route::controller(App\Http\Controllers\API\PesanController::class)->prefix('/pesan')->middleware('auth:sanctum')->group(function(){
        Route::get('/masuk','indexMA');
        Route::put('/edit/masuk/{id}','updateM');
        Route::delete('/delete/masuk/{id}','destroyM');

        Route::get('/keluar','indexKA');
        Route::post('/add/keluar','storeK');
        Route::delete('/delete/keluar/{id}','destroyK');
    });
    Route::controller(App\Http\Controllers\API\PeminjamanController::class)->prefix('/peminjaman')->middleware('auth:sanctum')->group(function(){
        Route::get('/','admin');
        Route::get('/pengembalian','admink');
    });
    Route::controller(App\Http\Controllers\API\ProfileController::class)->prefix('/profile')->middleware('auth:sanctum')->group(function(){
        Route::put('edit/{id}','updateA');
    });
    Route::controller(App\Http\Controllers\API\LaporanController::class)->prefix('/laporan')->middleware('auth:sanctum')->group(function(){
        Route::post('/pdf','pdf');
        Route::post('/pdfk','pdfk');
        Route::post('/pdfa','pdfa');
        Route::post('/excel','excel');
        Route::post('/excelk','excelk');
        Route::post('/excela','excela');
    });
    Route::controller(App\Http\Controllers\API\PemberitahuanController::class)->prefix('/pemberitahuan')->middleware('auth:sanctum')->group(function(){
        Route::get('/','index');
        Route::post('/add','store');
        Route::post('/edit/{id}','update');
        Route::delete('/delete/{id}','destroy');
    });
});
Route::prefix('/user')->group(function(){
    Route::controller(App\Http\Controllers\API\DashboardController::class)->prefix('/dashboard')->middleware('auth:sanctum')->group(function(){
        Route::get('/','indexU')->name('user.dashboard');
        // Route::put('/edit/{id}','update');
        // Route::delete('/delete/{id}','destroy');
    });
    Route::controller(App\Http\Controllers\API\ProfileController::class)->prefix('/profile')->middleware('auth:sanctum')->group(function(){
        Route::put('edit/{id}','updateU');
    });
    Route::controller(App\Http\Controllers\API\PeminjamanController::class)->prefix('/peminjaman')->middleware('auth:sanctum')->group(function(){
        Route::get('/','user');
        Route::post('/add','store');
        Route::put  ('/kembali/{id}','kembali');
    });
    Route::controller(App\Http\Controllers\API\PesanController::class)->prefix('/pesan')->middleware('auth:sanctum')->group(function(){
        Route::get('/masuk','indexMU');
        Route::put('/edit/masuk/{id}','updateM');
        Route::delete('/delete/masuk/{id}','destroyM');

        Route::get('/keluar','indexKU');
        Route::post('/add/keluar','storeK');
        Route::delete('/delete/keluar/{id}','destroyK');
    });
});

Route::controller(App\Http\Controllers\API\AnggotaController::class)->prefix('/anggota')->middleware('auth:sanctum')->group(function(){
    Route::post('/register','register');});
