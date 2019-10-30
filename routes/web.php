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

use App\Http\Controllers\PagesController;
use App\Http\Controllers\GuestsController;
use App\Http\Controllers\UnknownsController;
use App\Http\Controllers\EventController;

Route::get('/', 'GuestsController@create');
Route::get('/confirm', 'PagesControllers@confirm');
Route::post('/guest', 'GuestsController@store');
// Route::delete('/guest/{id}', 'GuestsController@destroy');

Route::get('/admin', 'GuestsController@index');
Route::get('/admin/unknown', 'GuestsController@indexUnknowns');
Route::get('/admin/list', 'EventController@index');
Route::get('/admin/download', 'EventController@download');

Route::get('/admin/guest', 'GuestsController@edit');
Route::patch('/admin/guest/{guest}', 'GuestsController@update');
Route::patch('/admin/guest/{guest}/deny', 'GuestsController@deny');
Route::patch('/admin/guest/{guest}/approve', 'GuestsController@approve');

Route::patch('/admin/list/upload', 'EventController@update');


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
    // - manage event type via dropdown form 
    // - create new open rsvp page
// 5. send email confirmations
    // - Done -- send RSVP confirmations
    // - send notification emails


