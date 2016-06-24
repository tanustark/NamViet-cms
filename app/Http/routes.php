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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'posts'], function(){
    Route::get('', 'PostsController@index');

    Route::get('create', 'PostsController@create');
    Route::post('confirm', 'PostsController@confirmation');

    Route::get('manage', 'PostsController@manage');
    Route::post('{postID}/update', 'PostsController@update');
    Route::get('edit/{postID}', 'PostsController@edit');
    Route::get('delete/{postID}', 'PostsController@delete');
    //Route::get('edit-confirm', 'PostsController@editConfirm');
    Route::get('myposts', 'PostsController@myposts');
    Route::get('myposts/{postID}', 'PostsController@showmypost');
    Route::get('myposts/edit/{postID}', 'PostsController@editmypost');
    Route::get('myposts/{postID}/update', 'PostsController@updatemypost');
    Route::get('{postID}', 'PostsController@show');




});



