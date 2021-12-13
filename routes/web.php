<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmailSenderController;

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
    return view('email');
});

Route::get('/contact', 'EmailSenderController@index');
Route::post('/send/mail', 'EmailSenderController@send');

Route::resource('mail', 'EmailSenderController');
