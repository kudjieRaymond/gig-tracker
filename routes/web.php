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

Auth::routes();

Route::group(['middleware'=>['auth']], function(){
	
	Route::get('/home', 'HomeController@index')->name('home'); 

	Route::resource('clients', 'ClientController');
	Route::resource('income-sources', 'IncomeSourceController');
	Route::resource('currencies', 'CurrencyController');
	Route::resource('currencies', 'CurrencyController');
	Route::resource('transaction-types', 'TransactionTypeController');
	Route::resource('project-statuses', 'ProjectStatusController');
	Route::resource('projects', 'ProjectController');
	Route::resource('notes', 'NoteController');
	Route::resource('documents', 'DocumentController');
	Route::post('documents/media', 'DocumentController@storeMedia')->name('documents.storeMedia');
	Route::resource('transactions', 'TransactionController');
  Route::get('reports', 'ReportController@index')->name('reports.index');

});