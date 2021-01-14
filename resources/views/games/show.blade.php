@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mb-3" >
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ $game->pathImage }}" alt="..." style="width: 280px">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h1 class="card-title">{{ $game->name }}</h1>
                    <p class="card-text">Disponible sur 
                        <span class="text-primary">
                            {{ $game->platform }}
                        </span>
                    </p>
                    <p class="card-text">Developpé par 
                        <span class="text-primary">
                            {{ $game->company }}
                        </span>
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-text"><small class="text-muted">Date de sortie : {{ $game->releaseDate }}</small></p>
                        </div>
                        <div class="col-md-6">
                            <p class="card-text">
                                <div class="bulleScore text-white" > 
                                    <span class="text-primary">
                                        Score
                                    </span>
                                    <span style='background-color: #f6993f'>
                                        {{ $game->score }}/20
                                    </span>
                                </div>
                            </p>
                        </div>
                    </div>
                    
                    {{-- <p class="card-text"><small class="text-muted">Date de sortie : {{ $game->releaseDate }}</small></p> --}}
                </div>
                <div class="card-footer" >
                    <div class="row">
                        <div class="col-md-4">
                            <img class="ml-5" src="/images/pegi/{{$game->pegi}}.jpg" alt="" style="width: 50px">
                        </div>
                        <div class="col-md-5" >
                            <span class="" style="float: right">
                                {{ $game->price }}
                                <button class="btn btn-primary text-white">Acheter</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container pl-5 pr-5">
        <div class="card ">
            <h2 class="text-primary mb-4 ml-4 mt-3">Description :</h2>
            <div class="container ">
                <div class="pl-5 pr-5 overflow-auto mb-5" style="max-width: 100%; max-height: 300px;">
                    <p class="">{{ $game->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-3">
    @foreach ($game->purchases as $pur)
        <div class="card mb-3 w-50" >
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="..." alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $pur->user_id }}</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
