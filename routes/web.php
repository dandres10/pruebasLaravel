<?php

/*DB::listen(function($query){
    echo "<pre>{{ $query->time }}</pre>";
});*/

Route::get('test', function () {
    $user           = new App\User;
    $user->name     = 'Alejandra';
    $user->email    = 'alejandra@gmail.com';
    $user->password = bcrypt('123');
    $user->role_id  = '2';
    $user->save();
    return $user;

});

Route::get('test1', function () {
    $r               = new App\Role;
    $r->name         = 'estudiante';
    $r->display_name = 'Estudiante';
    $r->description  = 'Este role tiene los permisos de estudiante';
    $r->save();
    return $r;

});

Route::get('roles', function () {
    return \App\Role::with('user')->get();
});
//-------------------------------------------------------------------------------
Route::get('/', 'PagesController@home')->name('home');

Route::get('saludos/{nombre?}', 'PagesController@saludo')->name('saludos');

Route::get('mensajes', 'MessagesController@index')->name('messages.index');
Route::get('mensajes/create', 'MessagesController@create')->name('messages.create');
Route::post('mensajes', 'MessagesController@store')->name('messages.store');
Route::get('mensajes/{id}', 'MessagesController@show')->name('messages.show');
Route::get('mensajes/{id}/edit', 'MessagesController@edit')->name('messages.edit');
Route::put('mensajes/{id}', 'MessagesController@update')->name('messages.update');
Route::delete('mensajes/{id}', 'MessagesController@destroy')->name('messages.destroy');

Route::get('usuarios', 'UsersController@index')->name('usuarios.index');
Route::get('usuarios/create', 'UsersController@create')->name('usuarios.create');
Route::post('usuarios', 'UsersController@store')->name('usuarios.store');
Route::get('usuarios/{id}', 'UsersController@show')->name('usuarios.show');
Route::get('usuarios/{id}/edit', 'UsersController@edit')->name('usuarios.edit');
Route::delete('usuarios/{id}', 'UsersController@destroy')->name('usuarios.destroy');
Route::put('usuarios/{usuarios}', 'UsersController@update')->name('usuarios.update');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('loginn');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');
