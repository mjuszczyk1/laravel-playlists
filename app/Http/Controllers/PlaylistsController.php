<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Playlist;
use App\PlaylistSong;
use App\Songs;
use App\User;

class PlaylistsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playlists = Playlist::latest()
                        ->where('user_id', auth()->user()->id)
                        ->orderBy('updated_at', 'desc')
                        ->get();
        // $playlists now has all playlists by the currently logged in user.
        return view('playlists.index', compact('playlists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // THIS MAY BE UNNECCESSARY AFTER REWORK.
        return view('playlists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!empty(request('name'))){
            $this->validate($request, [
                'name' => 'bail|required|min:4|max:255'
            ]);
            auth()->user()->createPlaylist(
                new Playlist(request(['name']))
            );
            $new = Playlist::where('name', request('name'))->get();
            return '<h2><a href="/profile/'.auth()->user()->id.'/playlists/'.$new[0]->id.'">'.request('name').'</a></h2>';
        }
        return false;
        // THIS RETURN WILL NEED TO CHANGE BECAUSE IT WILL BE SENT BACK
        // LIKE AJAX SO IT CAN JUST APPEAR RIGHT ON THE PAGE.
        // return redirect('/profile/playlists');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, $playlist)
    {
        $currentPlaylist = Playlist::where([
                            ['id', '=', $playlist],
                            ['user_id', $user->id]])
                            ->limit(1)
                            ->get();

        $songs = PlaylistSong::where('playlist_id', $playlist)
                            ->join('songs', 'songs.id', '=', 'playlist_songs.song_id')
                            ->get();

        return view('playlists.show', compact('currentPlaylist', 'songs'));
    }

    public function search(User $user, $playlist)
    {
        return 'here, we will return JSON object of whatever they want. If they want Artists, it\'ll be {artists: {name: 1, name: 2, name: 3,}} etc etc';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
