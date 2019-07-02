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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/restrito/prof', 'HomeController@loginProf')->name('loginProf');
Route::post('/restrito/prof', 'HomeController@postloginProf')->name('postloginProf');

Route::get('/restrito/user', 'HomeController@loginUser')->name('loginUser');
Route::post('/restrito/user', 'HomeController@postloginUser')->name('postloginUser');

Route::any('/logout', 'HomeController@logout')->name('logout');


Route::get('/admin/{nivel_acesso}/{id}', 'AdminController@painel')->name('adminPainel');

Route::get('/admin/{nivel_acesso}/{id}/professor/add', 'AdminController@getAddProfessor')->name('getAddProfessor');
Route::post('/admin/{nivel_acesso}/{id}/professor/add', 'AdminController@postAddProfessor')->name('postAddProfessor');

Route::get('/admin/{nivel_acesso}/{id}/aluno/add', 'AdminController@getAddAluno')->name('getAddAluno');
Route::post('/admin/{nivel_acesso}/{id}/aluno/add', 'AdminController@postAddAluno')->name('postAddAluno');

Route::get('/admin/{nivel_acesso}/{id}/concurso/add', 'AdminController@getAddConcurso')->name('getAddConcurso');
Route::post('/admin/{nivel_acesso}/{id}/concurso/add', 'AdminController@postAddConcurso')->name('postAddConcurso');

Route::get('/admin/{nivel_acesso}/{id}/materia/add', 'AdminController@getAddMateria')->name('getAddMateria');
Route::post('/admin/{nivel_acesso}/{id}/materia/add', 'AdminController@postAddMateria')->name('postAddMateria');


Route::get('/prof/{nivel_acesso}/{id}/{idMateria}/add', 'ProfessorController@getAdicionar')->name('getAddQuest');
Route::post('/prof/{nivel_acesso}/{id}/{idMateria}/add', 'ProfessorController@postAdicionar')->name('postAddQuest');

Route::get('/prof/{nivel_acesso}/{id}/{idMateria}/listar', 'ProfessorController@getListar')->name('getListarQuest');

Route::post('/prof/{nivel_acesso}/{id}/excluir/{idQuestao}', 'ProfessorController@postExcluirQuest')->name('postExcluirQuest');


Route::get('/aluno/{nivel_acesso}/{id}/exercicios', 'AlunoController@getExercicios')->name('getExercicios');
Route::get('/aluno/{nivel_acesso}/{id}/exercicios/{idConcurso}', 'AlunoController@getMaterias')->name('getMaterias');
Route::get('/aluno/{nivel_acesso}/{id}/exercicios/{idConcurso}/{idMateria}', 'AlunoController@getListas')->name('getListas');
Route::post('/aluno/{nivel_acesso}/{id}/exercicios/{idConcurso}/{idMateria}/{idQuestao}', 'AlunoController@respostaExerc')->name('verifyQuest');
Route::any('/aluno/{nivel_acesso}/{id}/exercicios/{idConcurso}/{idMateria}/finalizar', 'AlunoController@finalizarExerc')->name('finalizarExerc');
