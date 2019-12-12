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
use Illuminate\Http\Request;

Route::get('/', function () {
    $plants = \App\Plant::all();
    //where('name', 'Brown Sporer')->get();
    //->take(2);
   // $plants =  $plants->except([1, 2, 3, 4, 5, 6]);

    return view('welcome', ['plants' => $plants]);
});




Route::get('/submit', 'PlantController@submit')->name('submit');
Route::post('/submit', 'PlantController@store')->name('store');

Route::get('/lista', 'PlantController@lista')->name('lista');

//Route::post('/edit/{id}', 'PlantController@edit')->name('edit');

//Route::get('/edit/{id}', 'PlantController@update')->name('update');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/mostrar-nome/{id}/{id1}', 'AjaxController@show');
Route::post('/mostrar-lista', 'AjaxController@lista');
Route::get('/delete/{id}', 'AjaxController@delete')->name('delete');
Route::get('/edit/{id}', 'AjaxController@edit')->name('edit');
Auth::routes();
Route::get('/teste', 'PlantController@teste')->name('teste');