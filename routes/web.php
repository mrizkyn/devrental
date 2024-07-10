<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\TransactionController;


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
    return view('landingpage.index');
});
Route::get('/listcar', function () {
    return view('landingpage.cars.index');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'role:Admin']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('cars', CarController::class);
});

Route::group(['middleware' => ['auth', 'role:Customer']], function () {
    Route::get('/customer/index', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/customer/cars', [CustomerController::class, 'cars'])->name('car.index');
    Route::get('/customer/cars/{car}', [CarController::class, 'show'])->name('car.show');


    Route::post('/form-step1', [TransactionController::class, 'postStep1'])->name('form.step1.post');
    Route::post('/form-step2', [TransactionController::class, 'postStep2'])->name('form.step2.post');
    Route::post('/form-step3', [TransactionController::class, 'postStep3'])->name('form.step3.post');
    Route::post('/payment', [TransactionController::class, 'postPayment'])->name('payment.post');
    


});
