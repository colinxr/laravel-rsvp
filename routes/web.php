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
Route::get('/admin/unknown', 'GuestsController@showUnknowns');
Route::get('/admin/list', 'PagesControllers@list');
Route::get('/admin/download', 'EventController@download');

Route::patch('/admin/unknown/deny/{id}', 'GuestsController@deny');
Route::patch('/admin/unknown/approve/{id}', 'GuestsController@approve');

Route::patch('/admin/event', 'EventController@update');


/*------------------------------------*
//
//  TO Dos
//
/*------------------------------------*/
// 0. Static resources on frontend -- wtfff
// 1. Add Approve/Deny buttons to unknown index
// 2. style table 
// 3. add header info to admin pages 
// 4. /admin/list functionality
    // - upload list: convert csv to database table
    // - manage event type via dropdown form 
    // - 
// 5. send email confirmations/notifications 


