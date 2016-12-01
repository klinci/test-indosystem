<?php

/**
 * Frontend Controllers
 */
Route::get('/', 'FrontendController@index')->name('frontend.index');
Route::get('macros', 'FrontendController@macros')->name('frontend.macros');

Route::get('guest/guest-book', 'FrontendController@guestbook');
Route::get('guest/gallery', 'FrontendController@gallery');
Route::post('guest/guest-book/add', 'FrontendController@addGuestbook');
Route::post('guest/guest-book/delete', 'FrontendController@deleteGuestbook');

/**
 * These frontend controllers require the user to be logged in
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User'], function() {
        Route::get('dashboard', 'DashboardController@index')->name('frontend.user.dashboard');
        Route::get('profile/edit', 'ProfileController@edit')->name('frontend.user.profile.edit');
        Route::patch('profile/update', 'ProfileController@update')->name('frontend.user.profile.update');
    });
});