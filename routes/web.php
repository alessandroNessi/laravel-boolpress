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
// routes/web.php

// Rotte pubbliche
Route::get('/', 'PageController@index');
Route::get('/posts', 'PostController@index');
Route::get('/apiposts', 'PageController@apiview')->name('guest.api');
Route::get('/posts/{slug}', 'PostController@show');

// Rotte Autenticazione
Auth::routes();

// Rotte area Admin non visibili se sloggati
Route::middleware('auth')->namespace('Admin')->name('admin.')->prefix('admin')->group(function() {
    Route::get('/home', 'HomeController@index')->name('home');
    //reindirizzo le rotte /post su /PostController
    Route::resource("posts","PostController");
});