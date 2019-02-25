@extends('layouts.app')

@section('content')

<section class="hero is-primary">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                Sites
            </h1>
        </div>
    </div>
</section>
<section class="section">
<div class="container">
    @foreach($ActiveSites as $Site)
        <div class="row">
            <div class="card">
                <div class="card-content">
                    <div class="media">
                        <div class="media-left">
                            <figure class="image is-25x25">
                                <img src="{{$Site->Image}}" alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="media-content">
                            <div class="content">
                                <p>
                                    <span class="is-size-2">{{$Site->Name}}</span>
                                    <br>
                                    <span class="has-text-grey-dark">
                                    {{$Site->Description}}
                                    </span>
                                </p>
                            </div>
                         </div>
                        <nav class="level is-mobile">
                            <div class="level-left">
                                <a class="level-item">
                                    <span class="icon is-small"><i class="fas fa-retweet"></i></span>
                                </a>
                                <a class="level-item">
                                    <span class="icon is-small"><i class="fas fa-heart"></i></span>
                                </a>
                            </div>
                        </nav>
                   </div>
                </div>
                <footer class="card-footer">
                    <span class="card-footer-item">
                        <a href="{{$Site->URL}}" class="button is-success">
                            Visit
                        </a>
                    </span>
                    <span class="card-footer-item">
                        <a href="{{ url('/site/' . strtolower($Site->PageName)) }}" class="button is-danger">
                            More Info
                        </a>
                    </span>
                </footer>
            </div>
        </div>
    @endforeach

</div>
</section>

@endsection

