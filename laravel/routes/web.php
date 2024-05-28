<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\CustomerController;

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
    return view('dashboard', ['name' => 'Samuel']);
})->name('home');

Route::get('/1604', function () {
    return "Hello, ini adalah situs saya";
});

Route::get('/foo', function () {
    return "Hello World !";
});

Route::post("/hotel/showProducts",[HotelController::class,'showProducts'])->name('hotel.showProducts');

Route::view('/r_view','welcome');

Route::view('ajaxExample', 'hotel.ajax');

Route::post("/hotel/showInfo",[HotelController::class, 'showInfo'])->name("hotels.showInfo");

Route::get('/user/{nrp}', function($nrp){
    return "ini adalah user dengan nrp :".$nrp;
})->name('user_nrp');

Route::get('/users/{nama?}', function($nama='Tony'){
    return "nama user ini adalah :".$nama;
});

// Route::get('/hotel', function(){
//     return "masuk page Hotel";
// });

Route::view('/kategori','kategori.index');

// Route::get('/promo', function(){
//     return "masuk page Promo";
// });

Route::get('/kategori/{tipe}', function($tipe){
    return "Daftar Kamar Hotel Kategori ".$tipe;
});

Route::get('/hotel/{nama}', function($nama){
    return "Deskripsi Hotel ".$nama;
});

Route::get('/promo/{nama}', function($nama){
    return "Deskripsi Promo ".$nama;
});

Route::get('/greeting', function(){
    return view('welcome', ['name' => 'Ben']);
});

Route::resource('product', ProductController::class);
Route::resource('hotel', HotelController::class);

Route::get('report/availableHotelRooms', [HotelController::class, 'availableHotelRoom']);

Route::resource('transaction', TransactionController::class);

Route::post('transaction/showDataAjax/', [TransactionController::class, 'showAjax'])->name('transaction.showAjax');

Route::resource('type', TypeController::class);

Route::resource('customer', CustomerController::class);

Route::post('customtype/getEditForm',[TypeController::class,'getEditForm'])->name('type.getEditForm');



