<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $guarded = [];
    public function playlistSong()
    {
        return $this->belongsTo(PlaylistSong::class);
    }
}
