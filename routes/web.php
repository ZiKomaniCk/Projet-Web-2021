<?php

use App\Game;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     $games = Game::all(); 
//     return view('games.index', ['games' => $games]);
// });

Route::get('/', function () {
    return redirect(route('games.index'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/carts/buy', 'CartController@buy')->name('buy');

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});

Route::resource("games", "GameController", ['except' => ['create', 'store', 'update', 'edit', 'destroy']]);

Route::resource("reviews", "ReviewController", ['except' => ['index']]);

Route::resource("carts", "CartController");
Route::patch('/carts/{rowId}', 'CartController@update')->name('carts.update');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/games', 'GameController', ['except' => ['show']]);
});

Route::get('/paiement', 'CheckoutController@index')->name('checkouts.index');
Route::post('/paiement', 'CheckoutController@store')->name('checkouts.store');

Route::post('/paiement/solde', 'CheckoutController@storeSolde')->name('checkouts.storeSolde');


Route::get('/merci', 'CheckoutController@thanks')->name('checkouts.thanks');

Route::get('/pdf', 'InvoiceController@show')->name('pdf.show');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/dashboards', 'DashboardController', ['except' => ['show', 'create', 'store', 'update', 'edit', 'destroy']]);
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/orders', 'OrderController', ['except' => ['show', 'create', 'store', 'update', 'edit', 'destroy']]);
});