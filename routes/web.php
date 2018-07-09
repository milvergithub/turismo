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

Route::get('', [
    'as' => 'home', 'uses' => 'HomeController@index'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/lugares', 'HomeController@lugares')->name('lugares');

Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/show/{id}', 'HomeController@show')->name('show');
Route::get('/showblog/{id}', 'HomeController@showblog')->name('showblog');

//Route::get('usuarios', [ 'as' => 'usuarios', 'uses' => 'UsuariosController@index']);
//Route::get('setting', [ 'as' => 'setting', 'uses' => 'UsuariosController@setting']);
Route::get('datos', [ 'as' => 'datos', 'uses' => 'UsuariosController@data']);
Route::get('datostudisticos', [ 'as' => 'datostudisticos', 'uses' => 'LugaresturisticosController@data']);
//Route::resource('usuario','UsuariosController');
//['except' => ['getActivate', 'anotherMethod']]


Route::get('/blogs', 'HomeController@blog')->name('blogs');
Route::group(['middleware' =>[ 'auth']], function() {
    Route::resource('blog', 'BlogController');
    Route::get('setting', [ 'as' => 'setting', 'uses' => 'UsuariosController@setting']);
    Route::resource('comentario','ComentarioController');
});

Route::group(['middleware' =>[ 'auth', 'role:admin']], function() {
    Route::resource('admin', 'AdministrarController');
    Route::resource('lugaresturisticos','LugaresturisticosController');
    Route::resource('usuario','UsuariosController');
    Route::resource('roles','RoleController');
});

Route::resource('fotos', 'FotosController');
//Route::resource('blog', 'BlogController');
Route::post('comentarioajax', [ 'as' => 'comentarioajax', 'uses' => 'ComentarioController@insertajax']);

Route::get('lang/{lang}', function ($lang) {
    session(['lang' => $lang]);
    App::setLocale($lang);
    return \Redirect::back();
})->where([
    'lang' => 'en|es'
]);
/**

Route::post('insert-ajax', function() {

    $data = Input::except('_token');
    DB::table('tbl_posts')->insert($data);

    //Fetch the last record inserted
    $id=DB::getPdo()->lastInsertId();

    $inserted_data = DB::table('tbl_posts')->where('id',$id)->first();
    return Response::json(['success'=>$inserted_data]);

});
 * */