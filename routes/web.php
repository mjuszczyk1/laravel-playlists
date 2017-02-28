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

/** CREATE
 * 
 */
Route::post('/collections/playlists', 'PlaylistsController@store');// Create new playlist
// There will be just a text box at the bottom of this page (which is the one that shows 
// all owned (current user's) playlists), that should be submitted with some AJAX to this
// route, and the playlist Name can show up on the page immediately.

/** READ
 *  Single
 *  Owned
 *  Others
 */
// ALL OWNED:
Route::get('/collections/playlists', 'PlaylistsController@index');// Get your own playlists. If logged out, directs to login page.
// SINGLE:
Route::get('/profile/{user}/playlists/{playlist}', 'PlaylistsController@show');// GET specific playlist. If logged out, may show playlist if it's top 5 most recent
// OTHERS:
Route::get('/profile/{user_id}/', 'HomeController@profile');// If {user_id} matches current session, see account details. If logged out, view other person's playlists

/** UPDATE
 * 
 */
Route::post('/profile/{user_id}/playlists/{playlist_id}', 'PlaylistsController@update');

/** DELETE
 * 
 */
Route::post('/profile/{user_id}/playlists/{playlist_id}', 'PlaylistsController@destroy');// Delete playlist

/** Add Songs
 *
 */
Route::get('/profile/{user}/playlists/{plyalist}/search', 'PlaylistsController@search');// Search for songs

Auth::routes();