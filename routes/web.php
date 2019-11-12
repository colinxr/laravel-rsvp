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

use App\Http\Controllers\GuestsController;
use App\Http\Controllers\UnknownGuestsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PagesController;

Route::get('/', 'GuestsController@create');
Route::get('/confirm', 'PagesController@confirm');
Route::post('/guest', 'GuestsController@store');
Route::delete('/guest/{id}', 'GuestsController@destroy');

Route::get('/admin', 'GuestsController@index');
Route::get('/admin/unknown', 'UnknownGuestsController@index');
Route::get('/admin/list', 'EventController@index');
Route::get('/admin/download', 'EventController@download');

Route::get('/admin/guest/{guest}', 'GuestsController@edit');
Route::patch('/admin/guest/{guest}', 'UnknownGuestsController@update');
Route::patch('/admin/guest/{guest}/deny', 'UnknownGuestsController@deny');
Route::patch('/admin/guest/{guest}/approve', 'UnknownGuestsController@approve');

Route::post('/admin/event/upload', 'EventController@store');
Route::patch('/admin/event/type', 'EventController@update');


/*------------------------------------*
//
//  TO Dos
//
/*------------------------------------*/
// 0. Done -- Static resources on frontend -- wtfff 
// 1. Done -- Add Approve/Deny buttons to unknown index
// 2. Done -- style table 
// 3. Done --add header info to admin pages 
// 4. /admin/list functionality
    // - upload list: convert csv to database table
    // - Done -- manage event type via dropdown form 
    // - create new open rsvp page
// 5. Done -- send email confirmations 
    // - Done -- send RSVP confirmations
    // - send notification emails


