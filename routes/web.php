<?php

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
	//session()->flush();
    return view('welcome');
});

Route::post('/registrar','RegistroUController@post');
Route::post('/datosC','RegistroUController@postC');
//Route::get('/perfilC', 'RegistroUController@showC');

Route::get('/admin', function () {
    $usuario= \DB::table('users')->insert([
    		'name' => 'Daniel',
			'email' => 'dani@dani.com',
			'password' => \Hash::make('dani'),
			'type' => 1,
			'remember_token' => '1',
			'created_at' =>  date('Y-m-d H:i:s'),
			'updated_at' =>  date('Y-m-d H:i:s')
			]);
		return 'ok';
});


Auth::routes();

//Routes of admin
Route:: get('/admin/datos/show', function(){
	dd('Llegue aquí');
});

Route::get('/home', 'HomeController@index');
//Routes of Custumers
Route::get('/custumers/datos/show', 'RegistroUController@showC');

