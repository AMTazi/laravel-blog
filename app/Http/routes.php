<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Database\Schema\PostgresBuilder ;
use Illuminate\Support\Facades\Artisan;


Route::resource('articles' ,'PostsController') ;

Route::resource('tags' ,'TagsController') ;

Route::controllers([

   'auth' =>'Auth\AuthController' ,
   'password' =>'Auth\PasswordController'

]); 

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/', function (){

    return redirect('/home') ;
});
