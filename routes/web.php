<?php

Route::group(['namespace' => 'User'], function () {

    Route::get('/', 'homeController@index');
    Route::get('post/{slug}', 'postController@post')->name('post');
    Route::get('post/tag/{tag}', 'homeController@tag')->name('tag');
    Route::get('post/category/{category}', 'homeController@category')->name('category');
});



Route::group(['namespace' => 'Admins'], function() {
    Config::set('auth.defines', 'admin');
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/admin', 'homeController@create');
        Route::get('/admin/posts', 'postsController@create')->name('post.create');
        Route::post('/admin/posts', 'postsController@store')->name('posts.store');
        Route::get('/admin/showposts', 'postsController@index')->name('post.index');
        Route::delete('/admin/delete/post/{id}', 'postsController@destroy')->name('post.destroy');
        Route::get('/admin/edit/post/{id}', 'postsController@edit')->name('post.edit');
        Route::PUT('/admin/update/post/{id}', 'postsController@update')->name('post.update');

        Route::get('/admin/tags', 'tagsController@create')->name('tag.create');
        Route::post('/admin/tags', 'tagsController@store')->name('tag.store');
        Route::get('/admin/showtag', 'tagsController@index')->name('tag.index');
        Route::delete('/admin/delete/tag/{id}', 'tagsController@destroy')->name('tag.destroy');
        Route::get('/admin/edit/tag/{id}', 'tagsController@edit')->name('tag.edit');
        Route::PUT('/admin/update/tag/{id}', 'tagsController@update')->name('tag.update');
        
        Route::get('/admin/admins', 'Admin@create')->name('admin.create');
        Route::post('/admin/admins', 'Admin@store')->name('admin.store');
        Route::get('/admin/showadmin', 'Admin@index')->name('admin.index');
        Route::delete('/admin/delete/admin/{id}', 'Admin@destroy')->name('admin.destroy');
        Route::get('/admin/edit/admin/{id}', 'Admin@edit')->name('admin.edit');
        Route::PUT('/admin/update/admin/{id}', 'Admin@update')->name('admin.update');
        
        Route::get('/admin/roles', 'RolesController@create')->name('role.create');
        Route::post('/admin/roles', 'RolesController@store')->name('role.store');
        Route::get('/admin/showrole', 'RolesController@index')->name('role.index');
        Route::delete('/admin/delete/role/{id}', 'RolesController@destroy')->name('role.destroy');
        Route::get('/admin/edit/role/{id}', 'RolesController@edit')->name('role.edit');
        Route::PUT('/admin/update/role/{id}', 'RolesController@update')->name('role.update');
        
        Route::get('/admin/categories', 'categoriesController@create')->name('category.create');
        Route::post('/admin/categories', 'categoriesController@store')->name('category.store');
        Route::get('/admin/showcategories', 'categoriesController@index')->name('category.index');
        Route::delete('/admin/delete/category/{id}', 'categoriesController@destroy')->name('category.destroy');
        Route::get('/admin/edit/category/{id}', 'categoriesController@edit')->name('category.edit');
        Route::PUT('/admin/update/category/{id}', 'categoriesController@update')->name('category.update');

        Route::get('login-admin', 'AdminController@showlogin')->name('loginadmin');
        Route::post('login-admin', 'AdminController@login')->name('loginadmin');
        //Route::get('logout-admin','AdminController@logout')->name('logoutadmin');
        Route::any('logout-admin', 'AdminController@logout')->name('logoutadmin');
    });
});
//Route::get('/admin2',function (){
//    return view('admins.admin2');
//})->name('admin2');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/adminhome', 'AdminController@index');