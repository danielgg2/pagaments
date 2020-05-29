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

Route::get('/', 'PagamentsController@getIndex');
Route::get('/pagament/{nivell}/{id}', 'PagamentsController@getPagament');
//Si es vol entrar a l'apartat administració s'ha de treure aquest filtre
Route::group(['middleware' => 'auth'], function () {
	Route::get('/administracio', 'PagamentsController@getAdmin');
	//CRUD Categories
	Route::get('/administracio/categories', 'CRUDCategoriesController@getCategories');
	Route::get('/administracio/categories/create', 'CRUDCategoriesController@getCatCreate');
	Route::post('/administracio/categories/eliminar/{id}', 'CRUDCategoriesController@deleteCat');
	Route::post('/administracio/categories/create', 'CRUDCategoriesController@postCatCreate');
	Route::get('/administracio/categories/editar/{id}', 'CRUDCategoriesController@getEditCat');
	Route::put('/administracio/categories/editar/{id}', 'CRUDCategoriesController@putEditCat');
	//CRUD pagaments
	Route::get('/administracio/pagaments', 'CRUDPagamentsController@getPagaments');
	Route::get('/administracio/pagaments/create', 'CRUDPagamentsController@getPagCreate');
	Route::post('/administracio/pagaments/eliminar/{id}', 'CRUDPagamentsController@deletePag');
	Route::post('/administracio/pagaments/create', 'CRUDPagamentsController@postPagCreate');
	Route::get('/administracio/pagaments/editar/{id}', 'CRUDPagamentsController@getEditPag');
	Route::put('/administracio/pagaments/editar/{id}', 'CRUDPagamentsController@putEditPag');
	//CRUD cursos
	Route::get('/administracio/cursos', 'CRUDCursosController@getCursos');
	Route::get('/administracio/cursos/create', 'CRUDCursosController@getCurCreate');
	Route::post('/administracio/cursos/eliminar/{id}', 'CRUDCursosController@deleteCur');
	Route::post('/administracio/cursos/create', 'CRUDCursosController@postCurCreate');
	Route::get('/administracio/cursos/editar/{id}', 'CRUDCursosController@getEditCur');
	Route::put('/administracio/cursos/editar/{id}', 'CRUDCursosController@putEditCur');
	//CRUD usuaris
	Route::get('/administracio/usuaris', 'CRUDUsuarisController@getUsuaris');
	Route::get('/administracio/usuaris/create', 'CRUDUsuarisController@getUsuCreate');
	Route::post('/administracio/usuaris/eliminar/{id}', 'CRUDUsuarisController@deleteUsu');
	Route::post('/administracio/usuaris/create', 'CRUDUsuarisController@postUsuCreate');
	Route::get('/administracio/usuaris/editar/{id}', 'CRUDUsuarisController@getEditUsu');
	Route::put('/administracio/usuaris/editar/{id}', 'CRUDUsuarisController@putEditUsu');
});
Route::get('/login', 'Auth\LoginController@showLoginForm')->middleware('guest');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/logout', 'Auth\LoginController@logout');
        // Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

        // Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');

