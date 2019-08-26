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
    return view('welcome');
});

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
Route::post('/evento/create', 'EventoController@create')->name('create_evento');
Route::get('/evento/create/form', 'EventoController@ShowForm')->name('showForm_create_evento');
Route::get('/evento/list', 'EventoController@read')->name('listEvent');
Route::get('/evento/show', 'EventoController@show')->name('showEvent');
Route::post('/evento/edit', 'EventoController@update')->name('editar_evento');
Route::get('/evento/delete', 'EventoController@delete')->name("deletar_evento");

//Atividades
Route::post('/atividade/create', 'AtividadeController@create')->name('create_atividade');
Route::get('/atividade/create/form', 'AtividadeController@showFormAtividade')->name('showFormAtividade');
Route::post('/atividade/update', 'AtividadeController@update')->name('editar_atividade');
Route::get('/atividade/delete', 'AtividadeController@delete')->name("deletar_atividade");

//inscricao Evento
Route::get('userEvento/inscricao/', 'userEventoController@inscrever')->name('inscrever_user_evento');

//inscricao Atividade
Route::get('userAtividade/inscricao/','UserAtividadeController@inscrever')->name('inscrever_user_atividade');


//admin
Route::get('/admin/evento/list', 'EventoController@read_dashboard')->name('list_evento_admin');



#exemplo do danilo
#Route::get('/', 'TaskController@index');
Route::get('/tasks/create', 'TaskController@create');
Route::put('/tasks/{task}', 'TaskController@update');
Route::delete('/tasks/{task}', 'TaskController@delete');
Route::get('/tasks/{task}', 'TaskController@show');
Route::get('/tasks/{task}/edit', 'TaskController@edit');
Route::post('/tasks', 'TaskController@store');