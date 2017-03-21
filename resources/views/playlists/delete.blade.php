@extends ('layouts.main')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Are you sure you want to delete <span class="text-danger">{{$playlists[0]->name}}</span>?</h1>
                <form method="GET" action="/profile/{{Auth::user()->id}}/playlists/{{$playlists[0]->id}}" class="d-inline-block">
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Never mind!</button>
                    </div>
                </form>
                <form method="POST" action="/profile/{{Auth::user()->id}}/playlists/{{$playlists[0]->id}}/delete" class="d-inline-block">
                    {{csrf_field()}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger">I'm sure, delete!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection