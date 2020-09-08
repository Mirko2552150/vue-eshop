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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// CHIEDO I PRODOTTI all API CONTROLLER, PRENDO PRODUCT  ALLA FUNZIONE GETPRODUCT
Route::get('products' , "Api\ApiController@getProducts");  // nome variabile / funzione all'interno del controller / nome rotta

// Route::post('productsSelected' , "Api\ApiController@checkout");  // nome variabile / funzione all'interno del controller / nome rotta

Route::namespace('Upr')
->name('upr.')
->prefix('upr')
// ->middleware('auth')
->group(function() {
    Route::post('cart' , "UprController@checkout")->name('checkout');  // nome variabile / funzione all'interno del controller / nome rotta
    Route::get('cart' , "UprController@checkout")->name('checkout');  // nome variabile / funzione all'interno del controller / nome rotta
    // Route::post('/cart', 'UprController@checkout')->name('upr.products.checkout');
    // Route::post('/checkout' , 'Upr\UprController@checkout')->name('products.checkout');
    // Route::get('/checkout' , 'Upr\UprController@checkout')->name('products.checkout');
    // Route::get('/home', 'HomeController@index')->name('home');

});

// Route::get('/upr/checkout', 'Api\ApiController@checkout')->name('upr.cart');
