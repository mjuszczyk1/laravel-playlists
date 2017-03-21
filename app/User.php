<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Playlist;
use App\Song;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function playlists()
    {
        return $this->hasMany(Playlist::class);
    }

    public function createPlaylist(Playlist $playlist)
    {
        $this->playlists()->save($playlist);
    }

    public function addSong(Song $song, Playlist $playlist)
    {
        
    }
}
