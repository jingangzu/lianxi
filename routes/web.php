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
use Illuminate\Support\Facades\Input;
Route::get('/', function () {
    return view('welcome');
});

//Route::get('/count', function () {
//    $class = new ReflectionClass('\App\Models\User');
//    $instance = $class->newInstance();
//    dd($instance);
//});
Route::get('excel/export','ExcelController@export');
Route::get('excel/import','ExcelController@import');
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/file/view','FileController@fileView')->middleware('test');
Route::post('/file/upload','FileController@fileUpload');
Route::get('/file/down','FileController@fileDown');
Route::get('/file/url','FileController@fileUrl');
Route::get('/export', 'FileController@export');

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


Route::get('tesfft',function(){
    echo trans('passwords.reset'); // 用户不存在
    echo trans('demo.email_has_registed', ['email' => 'anzhengchao@gmail.com']);
});

Route::get('/newQuery/insert','DataBaseController@newQueryInsert');

require __DIR__ . './route/trees.php';

Route::any('captcha-test', function()
{
    if (Request::getMethod() == 'POST')
    {
        $rules = ['captcha' => 'required|captcha'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
        {
            echo '<p style="color: #ff0000;">Incorrect!</p>';
        }
        else
        {
            echo '<p style="color: #00ff30;">Matched :)</p>';
        }
    }

    $form = '<form method="post" action="captcha-test">';
    $form .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
    $form .= '<p>' . captcha_img() . '</p>';
    $form .= '<p><input type="text" name="captcha"></p>';
    $form .= '<p><button type="submit" name="check">Check张伟</button></p>';
    $form .= '</form>';
    return $form;
});


Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
