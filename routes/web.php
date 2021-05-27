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

// account user
Route::get('/account','UserController@index')->name('account');
Route::get('/delete_account','UserController@deletarUsuario')->name('delete_account');
Route::post('/account/edit','UserController@edit')->name('edit_account');

// home
Route::get('/home', 'HomeController@index')->name('home');

//Evento
Route::post('/evento/create', 'EventoController@create')->name('create_evento')->middleware('can:isAdmin');
Route::get('/evento/create/form', 'EventoController@ShowForm')->name('showForm_create_evento')->middleware('can:isAdmin');
Route::get('/evento/list', 'EventoController@read')->name('listEvent');
Route::post('/evento/edit', 'EventoController@update')->name('editar_evento')->middleware('can:isAdmin');
Route::get('/evento/delete', 'EventoController@delete')->name("deletar_evento")->middleware('can:isAdmin');

//imageEvento
Route::get('/evento/galeria/read', 'GaleriaController@showGaleria')->name("show_galeria")->middleware('can:isAdmin');
Route::post('/evento/galeria/image/create','GaleriaController@addGaleria')->name('add_image_evento')->middleware('can:isAdmin');
Route::get('/evento/galeria/imagem/delete', 'GaleriaController@delete')->name('delete_image')->middleware('can:isAdmin');

//Atividades
Route::post('/atividade/create', 'AtividadeController@create')->name('create_atividade')->middleware('auth');
Route::get('/atividade/form', 'AtividadeController@showFormAtividade')->name('showFormAtividade');
Route::post('/atividade/update', 'AtividadeController@update')->name('editar_atividade')->middleware('can:isAdmin');
Route::get('/atividade/delete', 'AtividadeController@delete')->name("deletar_atividade")->middleware('can:isAdmin');

//Atividades em Analise
Route::get('/admin/atividade-em-analise/list', 'AtividadeController@listar_atividades_em_analise')->name('listar_atividades_em_analise')->middleware('can:isAdmin');
Route::get('/atividade/alterar-condicao', 'AtividadeController@alterar_condicao')->name('alterar_condicao')->middleware('can:isAdmin');

//inscricao Evento
Route::get('userEvento/inscricao/', 'userEventoController@inscrever')->name('inscrever_user_evento')->middleware('auth');
Route::get('/evento/lista-de-chamada', 'userEventoController@listaDeChamada')->name('lista_de_chamada')->middleware('can:isAdmin');
Route::get('/evento/lista-de-chamada/register', 'userEventoController@update')->name('registrar_lista_de_chamada')->middleware('can:isAdmin');
Route::get('userEvento/pegarTodasIncricoes', 'userEventoController@pegarTodasInscricoesUsuario')->name('pegar_todas_inscricoes');
Route::get('userEvento/pegarIncricoes', 'userEventoController@pegarInscricaoUsuario')->name('pegar_inscricoes');
Route::get('desinscrever/', 'userEventoController@desinscrever')->name('desinscrever')->middleware('auth');

//inscricao Atividade
Route::get('userAtividade/inscricao/','UserAtividadeController@inscrever')->name('inscrever_user_atividade')->middleware('auth');
Route::get('userAtividade/desinscricao/','UserAtividadeController@desinscrever')->name('desinscrever_user_atividade')->middleware('auth');
Route::get('/atividade/lista-de-chamada', 'UserAtividadeController@listaDeChamada')->name('lista_de_chamada_atividade')->middleware('can:isAdmin');
Route::get('/atividade/lista-de-chamada/register', 'UserAtividadeController@update')->name('registrar_lista_de_chamada_atividade')->middleware('can:isAdmin');

//admin
Route::get('/admin/evento/list', 'EventoController@read_dashboard')->name('list_evento_admin')->middleware('can:isAdmin');
Route::get('/admin/atividade/list', 'AtividadeController@read_dashboard')->name('list_atividade_admin')->middleware('can:isAdmin');
Route::get('admin/tornarAdmin/', 'UserController@TornarAdmin')->name('tornarAdmin')->middleware('can:isAdmin');
Route::get('/admin/pegarUsers', 'AtividadeController@pegarUsers')->name('pegarUsers')->middleware('can:isAdmin');
Route::get('/admin/users', 'UserController@pegarTodosUsers')->name('todosUsers')->middleware('can:isAdmin');

//apelido
Route::get('/{Apelido}', 'EventoController@show', function ($Apelido){})->name("showEvent");

//Trabalho
Route::get('/{Apelido}/trabalho/form', 'TrabalhoController@showFormTrabalho') ->name('showForm_create_trabalho')->middleware('auth');;
Route::post('/trabalho/create', 'TrabalhoController@createTrabalho')->name('create_trabalho')->middleware('auth');;

//PDF
Route::get('/pdf/certificado','PdfController@GeneratePDF')->name("GerarPDF");

//Template
Route::post('/template/create', 'templateController@create')->name('create_template')->middleware('can:isAdmin');
Route::get('/template/list', 'templateController@listTemplate')->name('list_template')->middleware('can:isAdmin');
Route::get('/template/showForm', 'templateController@showForm')->name('form_template')->middleware('can:isAdmin');
Route::post('/template/update', 'templateController@update')->name('update_template')->middleware('can:isAdmin');
Route::get('/template/delete', 'templateController@delete')->name('delete_template')->middleware('can:isAdmin');

