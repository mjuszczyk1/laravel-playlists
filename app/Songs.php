<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Songs extends Model
{
    public function playlistSong()
    {
        return $this->belongsTo(PlaylistSong::class);
    }
}
