<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Playlist;
use App\PlaylistSong;
use App\Songs;

class PlaylistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(auth()->user());
        $playlists = Playlist::latest()
                        ->get();
        return view('playlists.index', compact('playlists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        // dd(request());
        $this->validate($request, [
            'name' => 'bail|required|min:4|max:255'
        ]);
        auth()->user()->createPlaylist(
            new Playlist(request(['name']))
        );

        return redirect('/profile/playlists');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Playlist $playlist)
    {
        // find $playlist->id in playlist_songs table.
        // return all songs titles 
        $songs = PlaylistSong::where('playlist_id', $playlist->id)
                            ->join('songs', 'songs.id', '=', 'playlist_songs.song_id')
                            ->get();

        return view('playlists.show', compact('playlist', 'songs'));
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
