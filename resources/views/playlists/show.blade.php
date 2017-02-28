@extends ('layouts.main')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @include('partials.errors')
                <h1>{{$currentPlaylist[0]->name}}</h1>
                <ul>
                    @foreach($songs as $song)
                        <li>{{$song->title}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method="POST" id="searchForm">
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
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(function(){
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
            });
        });
    });
</script>
@endsection