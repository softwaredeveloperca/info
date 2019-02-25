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
    <div class="card">
        <div class="card-content">
            <h2 class="title"><img src="{{$SiteInfo->Image}}"> {{$SiteInfo->Name}}</h2>
            <h2 class="msg-subject">
                {{$SiteInfo->Description}}
            </h2>
            <ul>
            @foreach($SiteInfo->Category as $Category)
                <li><img src="http://www.informational.ca/images/logos/{{$Category->Logo_Small}}" alt="{{$Category->Description}}"><a href="{{ url('/site/category/' . $Category->PageName)}}">{{$Category->Name}}</a>
                </li>
            @endforeach
            </ul>
            <ul>
                @foreach($SiteInfo->Stats as $Stat)
                <li>
                    <a href="{{$Stat->URL}}">{{$Stat->Title}}</a>
                </li>
                @endforeach
            </ul>
            <p>
                <br><div class="field"><a class="button is-link" href="{{$SiteInfo->URL}}">Visit Site</a>
                <a class="button" href="{{$SiteInfo->URL}}/m/">Visit Mobile</a></div><br></p>
         </div>
    </div>
</section>


@endsection