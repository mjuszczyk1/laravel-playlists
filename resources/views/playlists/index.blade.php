@extends ('layouts.main')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>My Playlists</h1>
                <div id="user-playlists">
                    @foreach($playlists as $playlist)
                        <h2><a href="/profile/{{Auth::id()}}/playlists/{{$playlist->id}}">{{$playlist->name}}</a></h2>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method="POST" id="addPlaylist">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(function(){
        $('form#addPlaylist').submit(function(e){
            e.preventDefault();
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: window.location.href,
                type: 'POST',
                data: {_token: CSRF_TOKEN, name: $('input[name="title"]').val()},
                dataType: 'html',
                success: function(data) {
                    console.log(data);
                    $('#user-playlists').prepend(data);
                },
                error: function(data) {
                    // temporary?
                    alert("dont' fuck with my source");
                }
            });
        });
    });
</script>
@endsection