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
use App\Http\Controllers\EventsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminController;

Route::get('/', 'AdminController@index');

Route::name('admin')->group(function() {
    Route::get('/', 'AdminController@show');
    Route::get('/new', 'EventsController@create');
    Route::get('/events', 'EventsController@showAll');
    Route::post('/event', 'EventsController@store');

    Route::get('/{event}', 'EventsController@show');
    Route::get('/{event}/edit', 'EventsController@edit');
    Route::post('/{event}/list', 'InvitesController@store');
    Route::patch('/{event}/edit', 'EventsController@update');

    Route::get('/{event}/{guest}', 'GuestsController@show');
    Route::patch('/{event}/{guest}', 'GuestsController@update');
    Route::get('/{event}/{guest}/edit', 'GuestsController@edit');
    Route::patch('/{event}/{guest}/deny', 'UnknownGuestsController@deny');
    Route::patch('/{event}/{guest}/approve', 'UnknownGuestsController@approve');
});

Route::name('event')->group(function() {
    Route::get('/{slug}', 'EventsController@index');
    Route::get('/{slug}/confirm', 'EventsController@confirm');
    Route::post('/{slug}/guest', 'GuestsController@store');
});




// Route::get('/admin', 'GuestsController@index');
// Route::get('/admin/unknown', 'UnknownGuestsController@index');
// Route::get('/admin/list', 'EventController@index');
// Route::get('/admin/download', 'EventController@download');

// Route::patch('/admin/guest/{guest}/deny', 'UnknownGuestsController@deny');
// Route::patch('/admin/guest/{guest}/approve', 'UnknownGuestsController@approve');

// Route::post('/admin/event/upload', 'EventController@store');
// Route::patch('/admin/event/type', 'EventController@update');


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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
