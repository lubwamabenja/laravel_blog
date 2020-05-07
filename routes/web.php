<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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




Auth::routes(['verify' =>'true']);

//home Routes
Route::get('/','HomeController@index')->name('home');
Route::get('/home','HomeController@index')->name('home');

//Tag routes
Route::get('tags/u/{tag_name}',['as' => 'tags.single','uses' => 'TagController@getTag']);





Route::group(['middleware' => ['auth','verified']], function () {

    Route::get('mark-as-read', 'PostController@markNotification')->name('markNotification');
    //Posts Routes

    Route::resource('posts', 'PostController');
     //Categories Routes
     Route::resource('categories', 'CategoryController',['except'=> ['create','getCategory']]);

     //tags Controller
     Route::resource('tags', 'TagController',['except'=> ['create']]);

     //User Controller
     Route::resource('users', 'UserController');




});
 //About Controller

Route::resource('about', 'AboutController');

Route::group(['middleware' => ['web']], function () {
     //Blog routes
     Route::get('blog/{slug}',['as' => 'blogs.single','uses' => 'BlogController@getSingle'])
     ->where('slug','[\w\d\-\_]+');
     Route::get('blogs',['uses'=>'BlogController@getIndex','as'=>'blogs.index']);

     //contact routes

     Route::get('contact','ContactController@index');
     Route::post('contact','ContactController@postContact');





});

Route::get('category/{category}',['as' => 'categories.single','uses' => 'CategoryController@getCategory'])
     ->where('category','[\w\d\-\_]+');

//comment Controller
Route::post('comments/{post_id}',['uses' =>'CommentsController@store','as'=>
'comments.store']);


Route::group(['middleware' => ['web']], function () {
Route::get('comments/{id}/edit',['uses'=>'CommentsController@edit','as'=>
'comments.edit']);
Route::put('comments/{id}',['uses'=>'CommentsController@update','as'=>
'comments.update']);
Route::delete('comments/{id}',['uses'=>'CommentsController@destroy','as'=>
'comments.destroy']);
Route::get('comments/{id}/delete',['uses'=>'CommentsController@delete','as'=>
'comments.delete']);
});
