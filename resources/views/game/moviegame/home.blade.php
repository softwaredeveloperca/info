@extends('layouts.app')

@section('content')
    <div class="container is-fluid">
        <div class="columns is- is-marginless is-centered">
            <div class="column is-12">
                <nav class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            Movie Game
                        </p>
                    </header>

		    <div class="card-content">
            
			<div id="app">
			<moviegame-component></moviegame-component>
			</div>
                    </div>
                </nav>
                
            </div>
            
        </div>
    </div>
@endsection
