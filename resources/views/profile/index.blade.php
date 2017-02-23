@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>My Playlists</h1>
            @include('playlists.list')
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <button class="btn btn-primary"><a href="/profile/playlists/create" class="text-white d-block">Add a playlist</a></button>
        </div>
    </div>
</div>
@endsection
