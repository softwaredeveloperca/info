@extends('layouts.app')

@section('content')

<section class="hero is-primary">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                Category - {{$Category->Name}}
            </h1>
        </div>
    </div>
</section>

<section class="section">
    <div class="card">
        <div class="card-content">
            <h2 class="title"><img src="http://www.informational.ca/images/logos/{{$Category->Logo_Small}}"> {{$Category->Name}}</h2>
            <h2 class="msg-subject">
                {{$Category->Description}}
            </h2>
            <p>
                <ul>
                @foreach($Category->Site as $Site)
                    <li>
                           <img src="{{$Site->Image}}" alt="{{$Site->Description}}">
                            <a href="{{$Site->URL}}">{{$Site->Name}} [<a href="{{url('/site/' . $Site->PageName)}}">more info</a>]</a>
                    </li>
                @endforeach
                </ul>
            </p>

        </div>
    </div>
</section>


@endsection