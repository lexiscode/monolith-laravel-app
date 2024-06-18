<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
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
    return view('Welcome');
});

Route::get('customers',[CustomerController::class, 'index'])->name('customers.index');

Route::get('customers/create',[CustomerController::class, 'create']);
Route::post('customers',[CustomerController::class, 'store']);


Route::get('customers/{customer}/edit',[CustomerController::class, 'edit']);
Route::put('customers/{customer}',[CustomerController::class, 'update']);



Route::delete('customers/{customer}',[CustomerController::class, 'destroy']);
