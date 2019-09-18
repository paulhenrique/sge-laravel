<?php

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('/home', 'HomeController@index')->name('home');

//Evento
Route::post('/evento/create', 'EventoController@create')->name('create_evento')->middleware('can:isAdmin');
Route::get('/evento/create/form', 'EventoController@ShowForm')->name('showForm_create_evento')->middleware('can:isAdmin');
Route::get('/evento/list', 'EventoController@read')->name('listEvent');
Route::get('/evento/show', 'EventoController@show')->name('showEvent');
Route::post('/evento/edit', 'EventoController@update')->name('editar_evento')->middleware('can:isAdmin');
Route::get('/evento/delete', 'EventoController@delete')->name("deletar_evento")->middleware('can:isAdmin');



//imageEvento
Route::get('/evento/galeria/read', 'GaleriaController@showGaleria')->name("show_galeria")->middleware('can:isAdmin');
Route::post('/evento/galeria/image/create','GaleriaController@addGaleria')->name('add_image_evento')->middleware('can:isAdmin');
Route::get('/evento/galeria/imagem/delete', 'GaleriaController@delete')->name('delete_image')->middleware('can:isAdmin');


//Atividades
Route::post('/atividade/create', 'AtividadeController@create')->name('create_atividade')->middleware('can:isAdmin');
Route::get('/atividade/create/form', 'AtividadeController@showFormAtividade')->name('showFormAtividade')->middleware('can:isAdmin');
Route::post('/atividade/update', 'AtividadeController@update')->name('editar_atividade')->middleware('can:isAdmin');
Route::get('/atividade/delete', 'AtividadeController@delete')->name("deletar_atividade")->middleware('can:isAdmin');

//inscricao Evento
Route::get('userEvento/inscricao/', 'userEventoController@inscrever')->name('inscrever_user_evento')->middleware('auth');
Route::get('/evento/lista-de-chamada', 'userEventoController@listaDeChamada')->name('lista_de_chamada')->middleware('can:isAdmin');
Route::get('/evento/lista-de-chamada/register', 'userEventoController@update')->name('registrar_lista_de_chamada')->middleware('can:isAdmin');
//inscricao Atividade
Route::get('userAtividade/inscricao/','UserAtividadeController@inscrever')->name('inscrever_user_atividade')->middleware('auth');


//admin
Route::get('/admin/evento/list', 'EventoController@read_dashboard')->name('list_evento_admin')->middleware('can:isAdmin');


Route::get('/{Apelido}', 'EventoController@view');