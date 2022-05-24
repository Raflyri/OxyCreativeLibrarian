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

Route::get('/dashboard', [
    'uses' =>  'HomeController@index',
    'as' => 'dash.board'
]);

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Student Router
Route::get('/createstudent', [
    'uses' =>  'studentController@create',
    'as' => 'create.student'
]);

Route::get('/viewstudent', [
    'uses' =>  'studentController@index',
    'as' => 'view.student'
]);

Route::post('/storestudent', [
    'uses' =>  'studentController@store',
    'as' => 'store.student'
]);

// Book Router

Route::get('/createbook', [
    'uses' =>  'bookController@create',
    'as' => 'create.book'
]);

Route::get('/viewbook', [
    'uses' =>  'bookController@index',
    'as' => 'view.book'
]);

Route::post('/storebook', [
    'uses' =>  'bookController@store',
    'as' => 'store.book'
]);


// Book Issue Router

Route::get('/createissue/{id}', [
    'uses' =>  'issueController@create',
    'as' => 'issue.book'
]);

Route::post('/storeissue_book', [
    'uses' =>  'issueController@store',
    'as' => 'storeissue.book'
]);

Route::get('/viewissue', [
    'uses' =>  'issueController@index',
    'as' => 'viewissue.book'
]);

Route::get('/returned/{id}', [
    'uses' =>  'issueController@checked',
    'as' => 'return.book'
]);

Route::post('/sendmsg', [
    'uses' =>  'issueController@send',
    'as' => 'send.msg'
]);
