<?php

/*
 *--------------------------------------------------------------------------
 * Web Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register web routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * contains the "web" middleware group. Now create something great!
 *
 */

// GET homepage
Route::get('/', 'HomeController@home');

// GET user playlists
Route::get('/profile/playlists', 'ProfileController@index');

Route::get('/playlists', 'PlaylistsController@index');

// Create playlists
Route::get('/profile/playlists/create', 'PlaylistsController@create');
Route::post('/profile/playlists/create', 'PlaylistsController@store');

// View playlists details
Route::get('/profile/playlists/{playlist}', 'PlaylistsController@show');

// Add song to playlist - this is where we'll use the Spotify API eventually.
Route::get('/profile/playlists/{playlist}/add-song', 'PlaylistsController@addSong');

Auth::routes();

Route::get('/profile', 'HomeController@index');
