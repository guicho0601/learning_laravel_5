<?php

Route::get('foo','FooController@foo');

Route::get('/',function(){
   return "I'm in home";
});

Route::get('about','PagesController@about');

Route::get('contact','PagesController@contact');

Route::resource('articles','ArticlesController');

Route::get('tags/{tags}','TagsController@show');

Route::controllers(array(
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
));

Route::get('bar',array('middleware'=>'manager',function(){
    return 'this page is only view for manager';
}));

Route::get('login','FooController@login');
Route::post('login','FooController@makeLogin');
Route::get('logout','FooController@logout');