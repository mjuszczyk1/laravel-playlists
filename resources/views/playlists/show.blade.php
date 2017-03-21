@extends ('layouts.main')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @include('partials.errors')
                <h1 class="d-inline-block">{{$currentPlaylist[0]->name}}</h1>
                @if(!empty(Auth::user()->id) && $currentPlaylist[0]->user->id == Auth::user()->id)
                    <div class="post-controls d-inline-block float-right mt-2">
                        <form method="GET" action="/profile/{{Auth::user()->id}}/playlists/{{$currentPlaylist[0]->id}}/edit" class="d-inline">
                            <button type="submit" class="btn btn-warning">Edit</button>
                        </form>
                        <form method="GET" action="/profile/{{Auth::user()->id}}/playlists/{{$currentPlaylist[0]->id}}/delete" class="d-inline">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                @endif
                <ul>
                    @foreach($songs as $song)
                        <li>{{$song->title}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @if(!Auth::guest())
            <div class="row">
                <div class="col-6">
                    <form method="GET" id="searchForm">
                        <div class="form-group">
                            <label for="search">Search</label>
                            <input type="text" id="search" name="search" class="form-control">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="songsearch" value="artist" checked> Artist
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="songsearch" value="album"> Album
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="songsearch" value="song"> Song
                            </label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
                <div class="col-6" id="resultsCol">
                    <ul></ul>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(function(){
        function generateList (data, type) {
            let total = 0;
            if (type == 'album') {
                total = data.tracks.total;
            } else if (type == 'artist' || type=='song') {
                total = data.length;
            }
            for (let i = 0; i < total; i++) {
                let form = $('<form method="POST" action="/profile/{{Auth::user()->id}}/playlists/{{$currentPlaylist[0]->id}}/add"></form>');

                if (type == 'artist') {
                    form.append('<input type="hidden" name="title" value="'+data[i].name+'">');
                    form.append('<input type="hidden" name="artist" value="'+data[i].album.artists[0].name+'">');
                    form.append('<input type="hidden" name="album" value="'+data[i].album.name+'">');
                    form.append('<input type="hidden" name="year" value="'+data[i].album.release_date+'">');
                    form.append('<input type="hidden" name="preview" value="'+data[i].preview_url+'">');
                    form.append('<button type="submit" class="btn mb-2">'+data[i].name+'</button>');
                } else if (type == 'album') {
                    form.append('<input type="hidden" name="title" value="'+data['tracks'].items[i].name+'">');
                    form.append('<input type="hidden" name="artist" value="'+data['tracks'].items[i].artists[0].name+'">');
                    form.append('<input type="hidden" name="album" value="'+data['album']+'">');
                    form.append('<input type="hidden" name="year" value="'+data['year']+'">');
                    form.append('<input type="hidden" name="preview" value="'+data['tracks'].items[i].name+'">');

                    form.append('<button type="submit" class="btn mb-2">'+data['tracks'].items[i].name+'</button>');
                } else if (type == 'song') {
                    form.append('<input type="hidden" name="title" value="'+data[i].name+'">');
                    form.append('<input type="hidden" name="artist" value="'+data[i].artists[0].name+'">');
                    form.append('<input type="hidden" name="album" value="'+data[i].album.name+'">');
                    // form.append('<input type="hidden" name="year" value="'+data['year']+'">');
                    form.append('<input type="hidden" name="preview" value="'+data[i].preview_url+'">');
                    form.append('<button type="submit" class="btn mb-2">'+data[i].name+'</button>');
                }
                form.prepend('<input type="hidden" name="_token" value="{{csrf_token()}}">');
                $('#resultsCol ul').prepend(form);
            }


        }
        $('form#searchForm').submit(function(e){
            e.preventDefault();
            let type = '';
            if ($('input[value="artist"]:checked').length > 0) {
                type = 'artist'
            } else if ($('input[value="album"]:checked').length > 0) {
                type = 'album';
            } else if ($('input[value="song"]:checked').length > 0) {
                type = 'song';
            }
            const params = {string: $('input[name="search"').val(), type: type};
            $.get(window.location.href + '/search', params, function(data){
                console.log(data);
                // $('div.container').prepend(data);
                $('#resultsCol ul').empty();
                generateList(data, type);
            });
        });
    });
</script>
@endsection