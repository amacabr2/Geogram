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

Route::get('/', 'WelcomeController@index')->name('welcome');

Route::post('/contact', 'WelcomeController@contact')->name('contact');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/users/search', 'UserController@search')->name('users.search');
    Route::put('/users/{id}', 'UserController@update')->name('users.update')->where('id', '[0-9]+');

    Route::group(['prefix' => 'profil'], function () {
        Route::get('/{id}', 'ProfilController@show')->name('profil')->where('id', '[0-9]+');
        Route::get('/{id}/abonnements/', 'ProfilController@abonnements')->name('profil.abonnements')->where(['id' => '[0-9]+']);
        Route::get('/{id}/abonnes/', 'ProfilController@abonnes')->name('profil.abonnes')->where(['id' => '[0-9]+']);
        Route::get('/{id}/new-abonnement', 'ProfilController@addAbonnement')->name('profil.new-abonnement')->where(['id' => '[0-9]+']);
        Route::delete('/', 'ProfilController@deleteAbonnement')->name('profil.delete-abonnement');
    });


    Route::group(['prefix' => 'voyages'], function () {
        Route::post('/', 'VoyagesController@store')->name('voyage.store')->where('id', '[0-9]+');
        Route::put('/{id}', 'VoyagesController@update')->name('voyage.update')->where('id', '[0-9]+');
        Route::get('/create', 'VoyagesController@create')->name('voyage.create');
        Route::get('/edit/{id}', 'VoyagesController@edit')->name('voyage.edit')->where('id', '[0-9]+');
        Route::get('/{id}', 'VoyagesController@show')->name('voyage.show')->where('id', '[0-9]+');
        Route::delete('/', 'VoyagesController@delete')->name('voyage.delete');
    });

    Route::group(['prefix' => 'posts'], function () {
        Route::post('/', 'PostsController@store')->name('post.store')->where('id', '[0-9]+');
        Route::put('/{id}', 'PostsController@update')->name('post.update')->where('id', '[0-9]+');
        Route::get('/create', 'PostsController@create')->name('post.create');
        Route::get('/edit/{id}', 'PostsController@edit')->name('post.edit')->where('id', '[0-9]+');
        Route::get('/{id}', 'PostsController@show')->name('post.show')->where('id', '[0-9]+');
        Route::delete('/', 'PostsController@delete')->name('post.delete');
    });

    Route::post('/attachments', 'AttachmentController@store')->name('attachments.store');

    Route::group(['prefix' => 'comment'], function () {
        Route::post('/{id}', 'CommentairesController@store')->name('comment.store')->where('id', '[0-9]+');
        Route::delete('/{post}', 'CommentairesController@delete')->name('comment.delete')->where('post', '[0-9]+');
        Route::put('/{post}', 'CommentairesController@update')->name('comment.update')->where('post', '[0-9]+');
    });

});