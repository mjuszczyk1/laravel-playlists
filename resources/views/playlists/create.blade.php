@extends ('layouts.main')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @include('partials.errors')
                <form method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection