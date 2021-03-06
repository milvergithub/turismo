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
Route::get('/show/{id}', 'HomeController@show')->name('show');
Route::get('/roadmap/{id}/latitude/{lat}/longitude/{long}', 'HomeController@showRoadMap');

//Route::get('usuarios', [ 'as' => 'usuarios', 'uses' => 'UsuariosController@index']);
//Route::get('setting', [ 'as' => 'setting', 'uses' => 'UsuariosController@setting']);
Route::get('datos', [ 'as' => 'datos', 'uses' => 'UsuariosController@data']);
Route::get('datostudisticos', [ 'as' => 'datostudisticos', 'uses' => 'LugaresturisticosController@data']);
Route::get('datosmessages', [ 'as' => 'datosmessages', 'uses' => 'MessageContactController@data']);
//Route::resource('usuario','UsuariosController');
//['except' => ['getActivate', 'anotherMethod']]


Route::get('/blogshome', 'HomeController@blog')->name('blogshome');
Route::group(['middleware' =>[ 'auth']], function() {
    Route::get('/contact', 'HomeController@contact')->name('contact');
    Route::get('/showblog/{id}', 'HomeController@showblog')->name('showblog');
    Route::resource('blog', 'BlogController');
    Route::get('setting', [ 'as' => 'setting', 'uses' => 'UsuariosController@setting']);
    Route::put('updateuser/{id}', 'UsuariosController@updateData')->name('usuario.updatedata');
    Route::resource('comentario','ComentarioController');
    Route::resource('messagecontact','MessageContactController');
});

Route::group(['middleware' =>[ 'auth', 'role:admin']], function() {
    Route::resource('admin', 'AdministrarController');
    Route::resource('lugaresturisticos','LugaresturisticosController');
    Route::resource('usuario','UsuariosController');
    Route::resource('roles','RoleController');
    Route::get('blogs', [ 'as' => 'blogs', 'uses' => 'BlogController@data']);
    Route::get('blogs/delete/{id}', 'BlogController@deleteBlog');
});
//create-lugar-turistico
Route::group(['middleware' =>['permission:create-lugar-turistico']], function() {
    Route::get('lugares/turisticos/create','LugaresturisticosController@createGuest')->name('lugares.createGuest');
    Route::post('lugares/turisticos/store','LugaresturisticosController@storeGuest')->name('lugares.storeGuest');
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