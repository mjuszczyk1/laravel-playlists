@extends ('layouts.main')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @include('playlists.list')
            </div>
        </div>
    </div>
@endsection