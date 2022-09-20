<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditController;
use App\Http\Controllers\AgentController;
// use App\Http\Controllers\LoginController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\MysalesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboradController;
use App\Http\Controllers\MyproductController;
use App\Http\Controllers\AllProductController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get("/product", [ProductController::class, 'product'])->name('product');
Route::put("/product", [ProductController::class, 'produtreg'])->name('produtreg');
Route::get("/agent", [AgentController::class, 'agent'])->name('agent');
Route::get("/edit/{id}", [EditController::class, 'edit'])->name('edit');
Route::put("/edit/{id}", [EditController::class, 'update'])->name('update');
Route::get("/allproduct", [AllProductController::class, 'allproduct'])->name('allproduct');
Route::get("/allproduct/{id}", [AllProductController::class, 'destroy'])->name('destroy');

Route::get('/dashborad', [DashboradController::class, 'index'])->name('dashborad');
Route::get('/myproduct', [MyproductController::class, 'myproduct'])->name('myproduct');
Route::get('/sales/{id}', [SalesController::class, 'sales'])->name('sales');
Route::put("/sales/{id}", [SalesController::class, 'store'])->name('store');
Route::get("/mysales", [MysalesController::class, 'mysales'])->name('mysales');
Route::get("/mysales/{id}", [MysalesController::class, 'changeStatus'])->name('mysales.changeStatus');
Route::get("/allsales", [SalesController::class, 'Allsales'])->name('Allsales');

Route::get("/customer", [CustomerController::class, 'customer'])->name('customer');
Route::put("/customerRegister", [CustomerController::class, 'customerRegister'])->name('customerRegister');
Route::get("/seecustomer", [CustomerController::class, 'seecustomer'])->name('seecustomer');



// Route::get("/login", [LoginController::class, 'login']);
