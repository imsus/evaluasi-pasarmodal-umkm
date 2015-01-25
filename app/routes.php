<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Blade::setContentTags('<%', '%>');
Blade::setEscapedContentTags('<%%', '%%>');

date_default_timezone_set('Asia/Jakarta');
Route::controller('kuesioner', 'KuesionerController');
Route::controller('/', 'HomeController');
