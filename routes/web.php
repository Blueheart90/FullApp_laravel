<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
Route::get('/mail', function () {

    $datos = [
                "titulo" => "Hola mundo",
                "contenido" => "Probando el envio de emails"
    ];

    Mail::send("emails.test", $datos, function($msj){
        $msj->to("chuchober@hotmail.com", "chucho")->subject("Ojito mensaje importante");
    });

});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin/users', 'AdminUsersController');