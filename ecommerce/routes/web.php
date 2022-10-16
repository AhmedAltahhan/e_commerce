<?php

namespace App\Http\Controllers;

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

Route::get('/', function () {
    return view('index');
});


Route::group(['middleware' => 'guest'] , function()
{
    Route::get('/login', [UserController::class , 'login_index'])->name('login');
    Route::post('login' , [UserController::class , 'login']);
    Route::get('/register', [UserController::class , 'register_index'])->name('register');
    Route::post('register' , [UserController::class , 'register']);
});



Route::group(['middleware' => 'auth.admin'] , function()
{
    Route::get('/welcome', [AdminController::class ,'welcome'])->name('welcome');
    Route::get('/add_vendor', [AdminController::class ,'show_add_vendor'])->name('vendor');
    Route::get('/show_vendor', [AdminController::class ,'show_vendor'])->name('show');
    Route::get('/updatedelete_vendor', [AdminController::class ,'updatedelete_vendor']);
    Route::get('update_vendor', [AdminController::class ,'update_vendor']);
    Route::post('/add_vendor', [AdminController::class , 'add_vendor'])->name('add_vendor');

});

Route::group(['middleware' => 'auth.vendor'] , function()
{
    Route::get('/show_orders', [vendorController::class ,'show_orders'])->name('show_orders');
    Route::get('/products', [vendorController::class ,'show_products'])->name('products');
    Route::get('/add_product', [vendorController::class ,'add_product'])->name('add_product');
    Route::view('update','update_product');
    Route::get('updatedelete', [vendorController::class ,'updatedelete']);
    Route::get('update_product', [vendorController::class ,'update']);
    Route::post('/add_products', [vendorController::class , 'add_products']);
});

Route::group(['middleware' => 'auth.client'] , function()
{
    Route::get('/show_products', [UserController::class , 'show_products'])->name('show_products');
    Route::post('/show_products', [UserController::class , 'orders'])->name('show_products');
});


Route::group(['middleware' => 'auth.basic'] , function()
{
    Route::get('/logout', [UserController::class ,'logout'])->name('logout');
});
