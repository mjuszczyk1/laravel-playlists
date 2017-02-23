@extends('layouts.main')

@section('content') 
    <div class="home">
        <div class="container-fluid" id="lead-image">
            <div class="row">
                <div class="text-container" id="lead-text">
                    <h1>Welcome To OkeyDokey</h1>
                    <h4>Mic check, 1, 2</h4>
                    <ul class="unstyled inline">
                        <li><a href="#what">What are we?</a></li>
                        <li><a href="#who">Who are we for?</a></li>
                        <li><a href="#get">Get OkeyDokey</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="main-content">
            <div class="row" id="what">
                <div class="col-12 text-center">
                    <h1 class="main-header text-thin">What is OkeyDokey?</h1>
                </div>
            </div>
            <div class="row" id="about">
                <div class="col-12 col-sm-6 col-md-offset-1 col-md-5">
                    <h2 class="no-top-marg">Everything you need for Karaoke</h2>
                    <p>Church-key pug hoodie, kombucha dreamcatcher williamsburg authentic intelligentsia locavore artisan sustainable pinterest humblebrag kale chips hella. Yuccie locavore meggings slow-carb sartorial, affogato sustainable farm-to-table +1 portland dreamcatcher street art chia messenger bag.</p>
                </div>
                <div class="col-12 col-sm-6 col-md-6">
                    <img src="http://placehold.it/1200x900" />
                </div>
            </div>
            <hr>
            <div class="container" id="who">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h1 class="main-header text-thin">Who is OkeyDokey for?</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <h3 class="text-center">TEST 1</h3>
                        <img src="http://placehold.it/500x500"/>
                        <p>Church-key pug hoodie, kombucha dreamcatcher williamsburg authentic intelligentsia locavore artisan sustainable pinterest humblebrag kale chips hella.</p>
                    </div>
                    <div class="col-sm-4">
                        <h3 class="text-center">TEST 2</h3>
                        <img src="http://placehold.it/500x500"/>
                        <p>Church-key pug hoodie, kombucha dreamcatcher williamsburg authentic intelligentsia locavore artisan sustainable pinterest humblebrag kale chips hella.</p>
                    </div>
                    <div class="col-sm-4">
                        <h3 class="text-center">TEST 3s</h3>
                        <img src="http://placehold.it/500x500"/>
                        <p>Church-key pug hoodie, kombucha dreamcatcher williamsburg authentic intelligentsia locavore artisan sustainable pinterest humblebrag kale chips hella.</p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container" id="get">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h1 class="main-header text-thin">Get OkeyDokey</h1>
                        <button class="btn btn-1 btn-1d"><a href>Today!</a></button>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <p>&copy; 2016. Juszczyk Bros Inc.</p>
                        <p>Word to your mother</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
