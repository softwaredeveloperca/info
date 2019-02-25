@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns is- is-marginless is-centered">
            <div class="column is-7">
                <nav class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            Dashboard
                        </p>
                    </header>

		    <div class="card-content">
            <a href="{{ url('home/moviegame') }}" class=".button .btn-defaul">Play Movie Game</a>
			<div id="app">
			<example-component></example-component>
			</div>
                    </div>
                </nav>
                
            </div>
            
        </div>
    </div>
@endsection
