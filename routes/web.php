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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'FrontSiteController@index')->name('index');
Route::get('/aboutus', 'FrontSiteController@aboutus')->name('aboutus');
Route::get('/services', 'FrontSiteController@services')->name('services');
Route::get('/contact', 'FrontSiteController@contact')->name('contact');
Route::post('/sendMail', 'FrontSiteController@sendMail')->name('sendMail');

Route::get('/projects', 'FrontSiteController@projects')->name('projects');
Route::get('/projects/{project}', 'FrontSiteController@singleProject')->name('projects.single');
Route::get('/projects/category/{category}', 'FrontSiteController@categoryWiseProject')->name('projects.category');

Route::get('/albums/{albums}', 'FrontSiteController@singleAlbum')->name('albums.single');

Route::get('/news', 'FrontSiteController@news')->name('news');
Route::get('/news/{news}', 'FrontSiteController@singleNews')->name('news.single');
//SiteMaps
Route::get('/sitemap.xml', 'FrontSiteController@sitemap');


//////////////////////////////

Auth::routes();


//////////////////////////////

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/backend/projects', 'ProjectController@index')->name('project.index');
Route::get('/backend/project/create', 'ProjectController@create')->name('project.create');
Route::post('/backend/projects', 'ProjectController@store')->name('project.store');
Route::get('/backend/project/{id}', 'ProjectController@show')->name('project.show');
Route::get('/backend/project/{id}/edit', 'ProjectController@edit')->name('project.edit');
Route::put('/backend/projects/{id}', 'ProjectController@update')->name('project.update');
Route::delete('/backend/project/{id}', 'ProjectController@destroy')->name('project.destroy');

Route::get('/backend/categories', 'CategoryController@index')->name('category.index');
Route::get('/backend/category/create', 'CategoryController@create')->name('category.create');
Route::post('/backend/categories', 'CategoryController@store')->name('category.store');
Route::get('/backend/category/{id}', 'CategoryController@show')->name('category.show');
Route::get('/backend/category/{id}/edit', 'CategoryController@edit')->name('category.edit');
Route::put('/backend/category/{id}', 'CategoryController@update')->name('category.update');
Route::delete('/backend/category/{id}', 'CategoryController@destroy')->name('category.destroy');

Route::resource('backend/news', 'NewsController');

Route::get('/backend/users', 'UsersController@index')->name('user.index');
Route::get('/backend/user/create', 'UsersController@create')->name('user.create');
Route::post('/backend/users', 'UsersController@store')->name('user.store');
Route::get('/backend/user/{id}/edit', 'UsersController@edit')->name('user.edit');
Route::put('/backend/user/{id}', 'UsersController@update')->name('user.update');
Route::get('/backend/user/show/{id}', 'UsersController@show')->name('user.show');
Route::delete('/backend/user/{id}', 'UsersController@destroy')->name('user.destroy');

Route::resource('backend/albums','AlbumController');

Route::get('/backend/albums/editGallery/{album}', 'AlbumController@editGallery')->name('albums.editGallery');

Route::get('/backend/albums/addPhoto/{album}', 'AlbumController@addPhoto')->name('albums.addPhoto');

Route::post('/backend/albums/storePhoto/{album}', 'AlbumController@storePhoto')->name('albums.storePhoto');

Route::get('/backend/albums/editPhoto/{id}', 'AlbumController@editPhoto')->name('albums.editPhoto');
Route::post('/backend/albums/updatePhoto/{id}', 'AlbumController@updatePhoto')->name('albums.updatePhoto');
Route::delete('/backend/albums/destroyPhoto/{id}/', 'AlbumController@destroyPhoto')->name('albums.destroyPhoto');


