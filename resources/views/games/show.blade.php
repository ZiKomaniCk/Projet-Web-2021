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
                    <p class="card-text ">Developpé par 
                        <span class="text-primary">
                            {{ $game->company }}
                        </span>
                    </p>
                    <div class="row ">
                        <div class="col-md-6 mt-5">
                            <p class="card-text"><small class="text-muted">Date de sortie : {{ $game->releaseDate }}</small></p>
                        </div>
                        <div class="col-md-6 mt-5">
                            <p class="card-text">
                                {{-- <div class="bulleScore text-white" >  --}}
                                    <span class="text-primary">
                                        Score
                                    </span>
                                    <span style='background-color: #f6993f'>
                                        {{ $game->score }}/20
                                    </span>
                                {{-- </div> --}}
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
                        <div class="col-md-6" >
                            @can('manage-users')
                                <span class="ml-2" style="float: right">
                                        <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="optionsDrop" data-bs-toggle="dropdown" aria-expanded="false">
                                            Admin Options
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="optionsDrop">
                                            <li><a class="dropdown-item" href="{{ route('admin.games.edit', ['game' => $game]) }}">Modifier</a></li>
                                            <li>
                                                <form action="{{ route('admin.games.destroy', ['game' => $game]) }}" method="POST" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class=" dropdown-item btn btn-danger">Delete</button>
                                                </form>
                                                {{-- <a class="dropdown-item" href="{{ route('games.show', ['game' => $game]) }}">Supprimer</a> --}}
                                            </li>
                                        </ul>
                                    </div>
                                </span>
                            @endcan
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
    <div class="row">
        
        @foreach ($game->reviews as $review)
        <div class="col-md-6">
            
            <div class="card mb-3 " >
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ $review->user->imgPath }}" alt="image de profil" style="max-width: 160px;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-2">
                                    <h3 class="card-title text-primary">{{ $review->user->nickname }}</h3>
                                </div>
                                <div class="col">
                                    <div class="rating">
                                        <div class="rating-upper" style="width: {{ ($review->rate)*20 }}%">
                                            <span>★</span>
                                            <span>★</span>
                                            <span>★</span>
                                            <span>★</span>
                                            <span>★</span>
                                        </div>
                                        <div class="rating-lower">
                                            <span>★</span>
                                            <span>★</span>
                                            <span>★</span>
                                            <span>★</span>
                                            <span>★</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h3 class="card-text">{{ $review->title }}</h3>
                            <p class="card-text">{{ $review->comment }}</p>
                            <p class="card-text"><small class="text-muted">Date du commentaire : {{ $review->updated_at }}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @endforeach
    </div>
    
</div>

@endsection

