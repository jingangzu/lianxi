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

//Route::get('/count', function () {
//    $class = new ReflectionClass('\App\Models\User');
//    $instance = $class->newInstance();
//    dd($instance);
//});

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/file/view','FileController@fileView')->middleware('test');
Route::post('/file/upload','FileController@fileUpload');
Route::get('/file/down','FileController@fileDown');
Route::get('/file/url','FileController@fileUrl');

Route::get('/timezone',function(){
//    return date_default_timezone_get();
//    date_default_timezone_set('UTC');
    return date('Y-m-d H:i:s');
});

Route::get('/env',function (){
//    setlocale(LC_ALL,'cht');
//    return '张伟';
    return $_ENV;
});

Route::get('/newQuery/insert','DataBaseController@newQueryInsert');
