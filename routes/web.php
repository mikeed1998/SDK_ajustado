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

    Route::prefix('slider')->name('slider.')->group(function(){
        Route::get('/', 'SliderPrincipalController@index')->name('slider.index');
        Route::post('/store', 'SliderPrincipalController@store')->name('slider.store');
        Route::delete('/destroy/{slider}', 'SliderPrincipalController@destroy')->name('slider.destroy');
    });

    Route::prefix('galeria')->name('galeria.')->group(function(){
        Route::get('/{catalogo}', 'CatalogoGaleriasController@index')->name('galeria.index');
        Route::post('/store', 'CatalogoGaleriasController@store')->name('galeria.store');
        Route::delete('/destroy/{galeria}', 'CatalogoGaleriasController@destroy')->name('galeria.destroy');
    });

    Route::prefix('categorias')->name('categorias.')->group(function(){
        Route::post('/store', 'CategoriasController@store')->name('store');
        Route::patch('/deactivate/{categoria}', 'CategoriasController@deactivate')->name('deactivate');
        Route::patch('/activate/{categoria}', 'CategoriasController@activate')->name('activate');
        Route::delete('/destroy/{categoria}', 'CategoriasController@destroy')->name('destroy');
        Route::get('/get-subcategorias/{categoria_id}', 'CategoriasController@getSubcategorias')->name('subcategorias');
    });

    Route::prefix('subcategorias')->name('subcategorias.')->group(function(){
        Route::post('/store', 'SubcategoriasController@store')->name('store');
        Route::patch('/deactivate/{subcategoria}', 'SubcategoriasController@deactivate')->name('deactivate');
        Route::patch('/activate/{subcategoria}', 'SubcategoriasController@activate')->name('activate');
        Route::delete('/destroy/{subcategoria}', 'SubcategoriasController@destroy')->name('destroy');
    });

    Route::prefix('catalogo')->name('catalogo.')->group(function(){
        Route::get('/', 'CatalogosController@index')->name('catalogo.index');
        Route::get('/create', 'CatalogosController@create')->name('catalogo.create');
        Route::post('/store', 'CatalogosController@store')->name('catalogo.store');
        Route::get('/edit/{catalogo}', 'CatalogosController@edit')->name('catalogo.edit');
        Route::get('/show/{catalogo}', 'CatalogosController@show')->name('catalogo.show');
        Route::put('/update/{catalogo}', 'CatalogosController@update')->name('catalogo.update');
        Route::patch('/deactivate/{catalogo}', 'CatalogosController@deactivate')->name('catalogo.deactivate');
        Route::patch('/activate/{catalogo}', 'CatalogosController@activate')->name('catalogo.activate');
        Route::delete('/destroy/{catalogo}', 'CatalogosController@destroy')->name('catalogo.destroy');
    });

    Route::prefix('tematicas')->name('tematicas.')->group(function(){
        Route::post('/store', 'TematicasController@store')->name('store');
        Route::patch('/deactivate/{tematica}', 'TematicasController@deactivate')->name('deactivate');
        Route::patch('/activate/{tematica}', 'TematicasController@activate')->name('activate');
        Route::delete('/destroy/{tematica}', 'TematicasController@destroy')->name('destroy');
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

    // Route::prefix('direcciones')->name('direcciones.')->group(function(){
    //     Route::post('/store', 'DireccionController@store')->name('store');
    // });

    Route::prefix('catalogo_caracteristica')->name('catalogo_caracteristica')->group(function() {
        Route::delete('destroy/{id}', 'CatalogoCaracteristicasController@destroy')->name('destroy');
    });

    Route::prefix('archivados')->name('archivados.')->group(function(){
        Route::get('/archivados-categorias', 'ArchivadosController@archivados_categorias')->name('archivados.categorias');
        Route::get('/archivados-catalogos', 'ArchivadosController@archivados_catalogos')->name('archivados.catalogos');
        Route::get('/archivados-tematicas', 'ArchivadosController@archivados_tematicas')->name('archivados.tematicas');
        Route::get('/archivados-blogs', 'ArchivadosController@archivados_blogs')->name('archivados.blogs');
    });

    Route::prefix('secciones')->name('seccion.')->group(function(){
        Route::get('/','SeccionController@index')->name('index');
        Route::get('/{slug}','SeccionController@show')->name('show');
    });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
