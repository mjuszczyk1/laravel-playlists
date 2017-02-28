<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Playlist;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.index');
    }

    /**
     * Show home page
     * 
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $playlists = Playlist::limit(3)
                        ->latest()
                        ->get();
        return view('home', compact('playlists'));



        // OLD:
        return view('home');
    }

    public function profile(User $user_id)
    {

    }
}
