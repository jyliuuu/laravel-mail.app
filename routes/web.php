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
    })->name('home');

Route::get('/send/mail', function () {
    return view('email-content');
})->name('preview');

Route::get('/contact', 'EmailSenderController@index')
    ->name('contact');

Route::post('send/mail', 'EmailSenderController@send');
