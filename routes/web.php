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

date_default_timezone_set('Asia/Jakarta');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/pengantar', 'HomeController@pengantar')->name('home.pengantar');
Route::get('/panduan', 'HomeController@panduan')->name('home.panduan');
Route::post('/logout', 'Auth\LoginController@logout');

Route::prefix('kuesioner')->group(
    function () {
        Route::get('/', 'QuestionnaireController@index')->name('questionnaire.index');
        Route::get('/create', 'QuestionnaireController@create')->name('questionnaire.create');
        Route::post('/', 'QuestionnaireController@store');
        Route::get('/{id}', 'QuestionnaireController@show')->name('questionnaire.show');
        Route::get('/{id}/edit', 'QuestionnaireController@edit')->name('questionnaire.edit');
        Route::match(['put', 'patch'], '/{id}', 'QuestionnaireController@update');
        Route::delete('/{id}/delete', 'QuestionnaireController@delete');
        Route::get('/{id}/print', 'QuestionnaireController@print')->name('questionnaire.print');
    }
);

Route::get('/info', 'HomeController@phpinfo')->name('phpinfo');
