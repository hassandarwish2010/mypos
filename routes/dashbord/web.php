<?php

Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],
function(){

Route::prefix('dashboard')->name('dashbord.')->middleware(['auth'])->group(function(){

Route::get('/index','DashboardController@index')->name('index');
//users
Route::resource('users','UserController')->except('show');
//cateories
Route::resource('categories','CategoryController')->except('show');

});

});



