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
route::group(['middleware'=>['web']],function(){


    // categories
    route::resource('categories', 'CategoryController', ['except' => ['create']]);
    route::resource('tags', 'TagController', ['except' => ['create']]);

    // comments
    route::post('comments/{post_id}',['uses'=>'CommentsController@store', 'as'=>'comment.store']);
    route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
    route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
    route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
    route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);

    // post route
    route::get('blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle'])
    ->where('slug', '[\w\d\-\_]+');
    route::get('blog',['uses' => 'BlogController@getIndex','as' => 'blog.index']);
    Route::get('contact','PagesController@getContact');
    Route::post('contact','PagesController@postContact');
    Route::get('about', 'PagesController@getAbout');
    Route::get('/', 'PagesController@getIndex');
    route::resource('posts','PostController');
});
