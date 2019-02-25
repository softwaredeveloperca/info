@extends('layouts.app')

@section('content')

<section class="hero is-primary">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                Categories
            </h1>
        </div>
    </div>
</section>

<section class="section">
    <div class="card">
        <div class="card-content">

            <p>
            <ul>
                @foreach($Categories as $Category)
                <li><img src="http://www.informational.ca/images/logos/{{$Category->Logo_Small}}" alt="{{$Category->Description}}"><a href="{{ url('/site/category/' . $Category->PageName)}}">{{$Category->Name}}</a>
                </li>
                @endforeach
            </ul>
            </p>

        </div>
    </div>
</section>


@endsection