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

Route::get('/', 'FrontController@home')->name('front.home');
Route::get('/home', 'FrontController@home')->name('front.home');
Route::get('/about', 'FrontController@about')->name('front.about');
Route::get('/experience', 'FrontController@experience')->name('front.experience');
Route::get('/portfolio', 'FrontController@portfolio')->name('front.portfolio');
Route::get('/my_cv', 'FrontController@my_cv')->name('front.my_cv');
Route::get('/blog', 'FrontController@blog')->name('front.blog');
Route::get('/contact', 'FrontController@contact')->name('front.contact');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
});

Route::group(['middleware' => ['auth', 'isAdmin']], function() {
    Route::get('homeA', 'SeccionController@index')->name('admin.index');

    Route::prefix('politicas')->name('politicas.')->group(function(){
        Route::get('/','PoliticasController@index')->name('index');
        Route::get('/edit/{id}','PoliticasController@edit')->name('edit');
        Route::put('/update/{id}','PoliticasController@update')->name('update');
    });

    Route::prefix('faqsA')->name('faqsA.')->group(function(){
        Route::get('/','FAQController@index')->name('index');
        Route::get('/create','FAQController@create')->name('create');
        Route::post('/store','FAQController@store')->name('store');
        Route::get('/show/{id}','FAQController@show')->name('show');
        Route::get('/edit/{id}','FAQController@edit')->name('edit');
        Route::put('/update/{id}','FAQController@update')->name('update');
        Route::delete('/destoy/{id}','FAQController@destroy')->name('destroy');
    });

    Route::prefix('elementos')->name('elementos.')->group(function(){
        Route::post('/elementos/update-texto', 'ElementosController@updateTexto')->name('update_texto');
        Route::post('/elementos/update-imagen', 'ElementosController@updateImagen')->name('update_imagen');
    });   

    Route::prefix('blogs')->name('blogs.')->group(function(){
        Route::get('/', 'BlogsController@index')->name('index');
        Route::get('/create', 'BlogsController@create')->name('create');
        Route::post('/store', 'BlogsController@store')->name('store');
        Route::get('/edit/{blog}', 'BlogsController@edit')->name('edit');
        Route::get('/show/{blog}', 'BlogsController@show')->name('show');
        Route::put('/update/{blog}', 'BlogsController@update')->name('update');
        Route::patch('/deactivate/{blog}', 'BlogsController@deactivate')->name('deactivate');
        Route::patch('/activate/{blog}', 'BlogsController@activate')->name('activate');
        Route::delete('/destroy/{blog}', 'BlogsController@destroy')->name('destroy');
    });

    Route::prefix('secciones')->name('seccion.')->group(function(){
        Route::get('/','SeccionController@index')->name('index');
        Route::get('/{slug}','SeccionController@show')->name('show');
    });
});