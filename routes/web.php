<?php

// Routes For Frontend Pages
Route::get('/', 'Frontend\HomeController@index')->name('home');
Route::get('/about', 'Frontend\AboutController@index')->name('about');
Route::get('/categories', 'Frontend\CategoriesController@index')->name('categories');
Route::get('/contact', 'Frontend\ContactController@index')->name('contact');
Route::get('/post/{slug}', 'Frontend\PostsController@post')->name('home.post');
Route::get('/category/{slug}', 'Frontend\PostsController@postsByCategories')->name('posts.by.categories');


Auth::routes();

// Routes For Dashboard Pages
Route::group(['middleware' => 'admin'], function(){
    Route::get('/admin', 'AdminController@index');
    Route::resource('/admin/users', 'AdminUsersController');
    Route::resource('/admin/posts', 'AdminPostsController');
    Route::resource('/admin/categories', 'AdminCategoriesController');
    Route::resource('/admin/media', 'AdminMediasController');
    Route::resource('/admin/comments', 'PostCommentsController');
    Route::resource('/admin/comment/replies', 'CommentRepliesController');
    Route::delete('/admin/delete/media', 'AdminMediasController@deleteMedia')->name('delete.media');

});

Route::group(['middleware' => 'auth'], function() {
    Route::post('comment/reply', 'CommentRepliesController@createReply');
});
