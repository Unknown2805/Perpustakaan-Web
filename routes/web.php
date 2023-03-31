<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/',[App\Http\Controllers\LandingController::class,'index']);

Auth::routes();
Route::controller(App\Http\Controllers\VisitorController::class)->prefix('/visitor')->group(function(){
    Route::get('/', 'index');
    Route::post('/add','store');
});
Route::middleware(['auth','role:admin'])->prefix('/admin')->group(function(){
    Route::controller(App\Http\Controllers\KategoriController::class)->prefix('/kategori')->group(function(){
        Route::get('/','index');
        Route::post('/add','store');
        Route::put('/edit/{id}','update');
        Route::delete('/delete/{id}','destroy');
    });
    Route::controller(App\Http\Controllers\DashboardController::class)->prefix('/dashboard')->group(function(){
        Route::get('/','indexA')->name('admin.dashboard');
        Route::post('/filter','filter')->name('admin.dashboard.filter');
    });
    Route::controller(App\Http\Controllers\PenerbitController::class)->prefix('/penerbit')->group(function(){
        Route::get('/','index');
        Route::post('/add','store');
        Route::put('/edit/{id}','update');
        Route::delete('/delete/{id}','destroy');
    });
    Route::controller(App\Http\Controllers\BukuController::class)->prefix('/buku')->group(function(){
        Route::get('/','index');
        Route::post('/add','store');
        Route::put('/edit/{id}','update');
        Route::delete('/delete/{id}','destroy');
    });
    Route::controller(App\Http\Controllers\AnggotaController::class)->prefix('/anggota')->group(function(){

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
    Route::controller(App\Http\Controllers\IdentitasController::class)->prefix('/identitas')->group(function(){
        Route::get('/','index');
        Route::put('/edit/{id}','update');
    });
    Route::controller(App\Http\Controllers\PesanController::class)->prefix('/pesan')->group(function(){
        Route::get('/masuk','indexMA');
        Route::put('/edit/masuk/{id}','updateM');
        Route::delete('/delete/masuk/{id}','destroyM');

        Route::get('/keluar','indexKA');
        Route::post('/add/keluar','storeK');
        Route::delete('/delete/keluar/{id}','destroyK');
    });
    Route::controller(App\Http\Controllers\PeminjamanController::class)->prefix('/peminjaman')->group(function(){
        Route::get('/','admin');
        Route::get('/pengembalian','admink');

    });
    Route::controller(App\Http\Controllers\ProfileController::class)->prefix('/profile')->group(function(){
        Route::put('edit/{id}','updateA');
    });
    Route::controller(App\Http\Controllers\LaporanController::class)->prefix('/laporan')->group(function(){
        Route::post('/pdf','pdf');
        Route::post('/pdfk','pdfk');
        Route::post('/pdfa','pdfa');
        Route::post('/excel','excel');
        Route::post('/excelk','excelk');
        Route::post('/excela','excela');
    });
    Route::controller(App\Http\Controllers\PemberitahuanController::class)->prefix('/pemberitahuan')->group(function(){
        Route::get('/','index');
        Route::post('/add','store');
        Route::put('/edit/{id}','update');
        Route::delete('/delete/{id}','destroy');
    });

});
Route::middleware(['auth','role:user'])->prefix('/user')->group(function(){
    Route::controller(App\Http\Controllers\DashboardController::class)->prefix('/dashboard')->group(function(){
        Route::get('/','indexU')->name('user.dashboard');
        // Route::put('/edit/{id}','update');
        // Route::delete('/delete/{id}','destroy');
    });
    Route::controller(App\Http\Controllers\ProfileController::class)->prefix('/profile')->group(function(){
        Route::put('edit/{id}','updateU');
    });
    Route::controller(App\Http\Controllers\PeminjamanController::class)->prefix('/peminjaman')->group(function(){
        Route::get('/','user');
        Route::post('/add','store');
        Route::put  ('/kembali/{id}','kembali');
    });
    Route::controller(App\Http\Controllers\PesanController::class)->prefix('/pesan')->group(function(){
        Route::get('/masuk','indexMU');
        Route::put('/edit/masuk/{id}','updateM');
        Route::delete('/delete/masuk/{id}','destroyM');

        Route::get('/keluar','indexKU');
        Route::post('/add/keluar','storeK');
        Route::delete('/delete/keluar/{id}','destroyK');
    });
});

Route::controller(App\Http\Controllers\AnggotaController::class)->prefix('/anggota')->group(function(){
    Route::post('/register','register');});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
