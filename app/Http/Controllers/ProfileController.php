<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Playlist;

class ProfileController extends Controller
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
                        ->where('user_id', auth()->user()->id)
                        ->orderBy('updated_at', 'desc')
                        ->get();
        return view('profile.index', compact('playlists'));
    }
}
