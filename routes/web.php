<?php

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Confirm Password
Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

// Email Verification Routes...
//Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
//Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
//Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::middleware('auth')->group(function () {
    Route::get('admin-panel/dashboard', 'DashboardController@index')->name('dashboard');


    Route::get('admin-panel/reply/{id}', 'ReplyController@reply')->name('reply.create');
    Route::post('/admin-panel/reply/{id}/', 'ReplyController@store')->name('reply.store');
    Route::post('admin-panel/reply/{reply}/destroy', 'ReplyController@destroy')->name('reply.destroy');
    Route::get('admin-panel/reply/edit/{id}', 'ReplyController@edit')->name('reply.edit');
    Route::post('admin-panel/reply/{reply}/update', 'ReplyController@update')->name('reply.update');


    Route::get('admin-panel/reviews', 'ReviewController@index')->name('reviews.index');
    Route::post('admin-panel/review/{review}/destroy', 'ReviewController@destroy')->name('review.destroy');
    Route::get('admin-panel/review/edit/{id}', 'ReviewController@edit')->name('review.edit');
    Route::post('admin-panel/review/{review}/update', 'ReviewController@update')->name('review.update');


    Route::get('admin-panel/articles', 'NewsController@index')->name('articles.index');
    Route::get('admin-panel/article/create', 'NewsController@create')->name('article.create');
    Route::post('admin-panel/article', 'NewsController@store')->name('article.store');
    Route::get('admin-panel/article/edit/{id}', 'NewsController@edit')->name('article.edit');
    Route::post('admin-panel/article/{article}/update', 'NewsController@update')->name('article.update');
    Route::post('admin-panel/article/{article}/destroy', 'NewsController@destroy')->name('article.destroy');

    Route::get('admin-panel/tag/create/{id}', 'TagsController@add')->name('tag.create');
    Route::get('admin-panel/tag/add', 'TagsController@addNew')->name('tag.add');
    Route::get('admin-panel/tag/{tag}/destroy', 'TagsController@destroy')->name('tag.destroy');
    Route::get('admin-panel/tag/{tag}/delete', 'TagsController@delete')->name('tag.delete');
});

Route::get('/article/{article}', 'ArticleController@article')->name('article');

Route::post('/article/{article}/review/', 'ReviewController@store')->name('review.store');

Route::get('/', 'HomeController@index')->name('home');
