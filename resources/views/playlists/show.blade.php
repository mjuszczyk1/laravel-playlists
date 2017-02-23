@extends ('layouts.main')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @include('partials.errors')
                <h1>{{$playlist->name}}</h1>
                <ul>
                    @foreach($songs as $song)
                        <li>{{$song->title}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection