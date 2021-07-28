<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    
    Route::resource('setlistgroups', \App\Http\Controllers\SetlistGroupsController::class);
    
    Route::get('setlists/create/{id}', [
        'as' => 'setlists.create',
        'uses' => '\App\Http\Controllers\SetlistsController@create'
    ]);

    Route::get('setlists/report/{id}', [
        'as' => 'setlists.report',
        'uses' => '\App\Http\Controllers\SetlistsController@report'
    ]);

    Route::resource('setlists', \App\Http\Controllers\SetlistsController::class, 
        ['except' => 'create']);
        
    Route::get('/setlists/{id}/sort', '\App\Http\Controllers\SetlistsController@sort')->name('setlists.sort');

    Route::resource('contacts', \App\Http\Controllers\ContactsController::class, 
        ['except' => 'show']);

    // Songs
    Route::get('/', [\App\Http\Controllers\SongController::class, 'index'])->name('songs');
    
});
