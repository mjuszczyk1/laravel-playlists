@foreach($playlists as $playlist)
    <h1><a href="/profile/playlists/{{$playlist->id}}">{{$playlist->name}}</a></h1>
@endforeach