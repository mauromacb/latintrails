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
    return redirect('/login');
});

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
Auth::routes();
Route::get('/home', 'HomeController@index');
Route::resource('/paquetesTuristicos', 'PaquetesTuristicosController');
Route::post('/getItinerario', 'PaquetesTuristicosController@getItinerario');
Route::post('/getFechas', 'PaquetesTuristicosController@getFechas');
Route::resource('/categorias', 'CategoriasController');

Route::resource('/comonosencontro', 'ComoNosEncontroController');
Route::get('/paquetesTuristicos/itinerarios/{id}', 'PaquetesTuristicosController@itinerarios');
Route::get('/crearItinerario/{id}', 'PaquetesTuristicosController@crearItinerario');

Route::post('/nuevoItinerario', ['as' => 'paquetesItinerarios.crear', 'uses' => 'PaquetesTuristicosController@nuevoItinerario']);
Route::post('/destroyItinerario', ['as' => 'paquetesItinerarios.destroy', 'uses' => 'PaquetesTuristicosController@destroyItinerario']);
Route::get('/editarItinerario', 'PaquetesTuristicosController@editarItinerario');
Route::post('/guardarItinerario', 'PaquetesTuristicosController@guardarItinerario');
Route::post('/ficheros', 'PaquetesTuristicosController@dropzoneStore');
Route::post('/estado', 'PaquetesTuristicosController@estado');
Route::resource('/hoteles', 'HotelesController');
Route::resource('/pagina', 'PaginaController');
Route::resource('/commentcard', 'CommentCardController');

Route::resource('/itinerario', 'ItinerarioController');
Route::get('/verItinerario/{id}', 'ItinerarioController@ver');
Route::resource('/categoriaItinerario', 'CategoriaItinerarioController');
Route::resource('/dia', 'DiaItinerarioController');
Route::get('/showItinerario/{id}', 'DiaItinerarioController@showItinerario');
Route::get('dia/{id}/editItinerario', 'DiaItinerarioController@editItinerario');
Route::get('dia/verDia/{id}', 'DiaItinerarioController@verDia');
Route::get('dia/createItinerario/{id}', 'DiaItinerarioController@createItinerario');

Route::get('/mapas/{id}', 'MapasController@index');
Route::get('/mapas/{id}/create', 'MapasController@create');
Route::post('/mapas', 'MapasController@store');
Route::get('/mapas/{mapa}/show', 'MapasController@show');
Route::put('/mapas/{mapa}', ['as' => 'mapas.update', 'uses' => 'MapasController@update']);
Route::get('/mapas/{mapa}/edit', 'MapasController@edit');
Route::delete('/mapas/{id}/{mapa}', 'MapasController@destroy');


Route::get('/calendarios/{id}', 'CalendarioItinerarioController@index');
Route::get('/calendarios/{id}/create', 'CalendarioItinerarioController@create');
Route::post('/calendarios', 'CalendarioItinerarioController@store');
Route::get('/calendarios/{calendario}/show', 'CalendarioItinerarioController@show');
Route::put('/calendarios/{calendario}', ['as' => 'calendarios.update', 'uses' => 'CalendarioItinerarioController@update']);
Route::get('/calendarios/{calendario}/edit', 'CalendarioItinerarioController@edit');
Route::delete('/calendarios/{calendario}', ['as' => 'calendarios.destroy', 'uses' => 'CalendarioItinerarioController@destroy']);

Route::resource('/formulariocommentcard', 'FormularioCommentCardController');
Route::resource('/guia', 'GuiaItinerarioController');

Route::get('/auth_login','API\ApiAuthController@userAuth');
Route::group(['middleware' =>'jwt.auth'],function(){
    Route::get('/getHotels','API\ApiAuthController@getHotels');
});

// API
// Access routes
Route::group(['prefix' => '/auth', 'middleware' => 'cors'], function () {
    Route::post('/authenticate', 'API\ApiAuthController@authenticate');
    Route::get('/me', 'API\ApiAuthController@getAuthenticatedUser');
});